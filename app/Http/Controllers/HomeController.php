<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\User;
use App\Models\State;
use App\Models\ChatMessage;
use App\Models\HomePageService;
use App\Models\UserCreator;
use App\Models\PromoCode;
use App\Models\Creator;
use App\Models\Earning;
use App\Models\Badge;
use Storage;
use Session;
use Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = HomePageService::latest()->take(5)->get();

        $creators = Creator::latest()->take(3)->get();

        $creators = [];

        $sender_id = auth()->user()->id;

        $chats = ChatMessage::latest('created_at')->where(['receiver' => 'Sponsor', 'message_to' => $sender_id])->groupBy('message_from')->get(['message_from', 'id', 'created_at']);

        foreach ($chats as $key => $chat) {
            $user = Creator::where('id', $chat->message_from)->first();
            $message = ChatMessage::latest()->where('message_from', $chat->message_from)->value('message');
            $chats[$key]->user = $user;
            $chats[$key]->message = $message;

            $count = UserCreator::where('creator_id',$chat->message_from)->where('user_id',auth()->user()->id)->count();

            if ($count) {
                $chats[$key]->favorite = 1;
            }
        }

        $campaigns = Campaign::where('sponsor', auth()->user()->id)->orderBy('id', 'desc')->take(1)->get();
        $campaign_count = Campaign::where('sponsor', auth()->user()->id)->orderBy('id', 'desc')->count();

        $featureds = Creator::where('status', 1)->inRandomOrder()->whereNotNull('badge_ids')->take(10)->get();

        foreach ($featureds as $key => $featured) {

            $count = UserCreator::where('creator_id',$featured->id)->where('user_id',auth()->user()->id)->count();

            if ($count) {
                $featureds[$key]->favorite = 1;
            }
        }       

        return view('sponsor.home', compact('campaigns','services', 'creators', 'chats', 'campaign_count', 'featureds'));
    }

    public function campaigns()
    {
        return view('sponsor.campaigns');
    }

    public function favorites()
    {
        $sponsor = User::with('creators')->find(auth()->user()->id);
        $favorites = $sponsor->creators;
        $campaigns = Campaign::orderBy('id', 'desc')->take(1)->get();    
        return view('sponsor.favorites', compact('favorites'));
    }

    public function upgrades()
    {   
        $badge_ids = User::where('id', auth()->user()->id)->value('badge_ids');
        $badge_ids = json_decode($badge_ids);
        $badges = Badge::latest()->where(['user_type' => 'Sponsor', 'status' =>1])->get();

        return view('sponsor.upgrades', compact('badges', 'badge_ids'));
    }

    public function stripePayment(Request $request)
    {

        $total = Session::get('total');

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $product_response = $stripe->products->create([
            'name' => 'Purchasing badges to upgarde profile',
        ]);        


        if(isset($product_response) && $product_response != ''){
            $price_response = $stripe->prices->create([
                'unit_amount' => $total*100,
                'currency' => 'inr',        
                'product' => $product_response['id'],
            ]);
        }

        if(isset($price_response) && $price_response != ''){              


            $payment_link_response = $stripe->paymentLinks->create([
                'line_items' => [
                    [
                        'price' => $price_response['id'],
                        'quantity' => 1,
                    ],
                ],
                'after_completion' => [
                    'redirect' => [
                        'url' => route('thankyou'),
                    ],
                    'type' => 'redirect'
                ]
            ]);

        }                

        if(isset($payment_link_response) && $payment_link_response != ''){                    
            $payment_link_id = $payment_link_response['id'];     

            Earning::create([
                'transaction_id' => $payment_link_id,
                'user_type' => 'Sponsor',
                'user_id' => auth()->user()->id,
                'username' => auth()->user()->first_name.' '.auth()->user()->last_name,
                'amount' => $total,
                'badges' => json_encode(Session::get('ids')),
                'status' => 0,
            ]);     

            Session::put(['payment_link_id' => $payment_link_id]);           

        }


        return redirect()->away($payment_link_response['url']);

    }

    public function upgardeSave(Request $request)
    {

        $selected = false;
        foreach ($request->badges['checked'] as $key => $badge) {
            if($badge == 1){
                $selected = true;
            }
        }

        if (!$selected) {
            Session::flash('message', 'Please select atleast one badges to proceed!'); 
            return redirect()->route('upgrades');
        }

        $total = 0;

        $ids = [];
        $selected_ids = [];

        if($request->badges && $request->badges['checked']){

            foreach ($request->badges['checked'] as $key => $badge) {


                if($badge == 1){
                    $total += $request->badges['price'][$key];
                    array_push($ids, (string)$key);
                }
                if($badge == 1 || $badge == 2){
                    array_push($selected_ids, (string)$key);
                }          
            }
        }

        $badges = Badge::whereIn('id', array_values($ids))->get();

        $sub_total = $total;
        $coupon_total = 0;
        $code = '';

        Session::put(['ids' => $ids, 'total' =>$total, 'selected_ids' => $selected_ids]);

        User::where('id', auth()->user()->id)->update(['badge_ids' => json_encode($selected_ids)]);

        if ((isset($ids)) && (count($ids) > 0)) {
            Campaign::where('sponsor', auth()->user()->id)->update(['badge_sort' => true]);
        }

        return view('sponsor.paid-service', compact('total', 'ids', 'badges', 'sub_total', 'coupon_total', 'code'));
    }

    public function applyCoupon(Request $request)
    {
        $sub_total = $request->sub_total;
        $total = $request->total;

        $promo_code = PromoCode::where('code', $request->coupon)->whereDate('valid_from_date', '<=' , date('Y-m-d'))->whereDate('valid_to_date', '>=' , date('Y-m-d'))->first();

        $ids = $request->ids;

        $badges = Badge::whereIn('id', Session::get('ids'))->get();

        $code = $request->coupon;

        $coupon_total = 0;


        if($promo_code){

            if ($promo_code->type == 'fixed') {
                $coupon_amt = $promo_code->value;
                $coupon_total = $request->total - $coupon_amt;
            }else{
                $coupon_amt = round(($request->total*($promo_code->value))/100, 2);
                $coupon_total = $request->total - $coupon_amt;
            }

            PromoCode::where('code', $request->coupon)->increment('used',1);

        }else{
            $error = 'Coupon not found';
            return view('sponsor.paid-service', compact('total', 'ids', 'badges', 'coupon_total', 'sub_total', 'code', 'error'));
        }


        $total = $coupon_total;

        $coupon_total = $coupon_amt;

        Session::put(['total' =>$total]);

        return view('sponsor.paid-service', compact('total', 'ids', 'badges', 'coupon_total', 'sub_total', 'code'));
    }


    public function paidService()
    {   
        return view('sponsor.paid-service');
    }

    public function Payments()
    {
        return view('sponsor.payments');
    }

    public function createcampaign()
    {
        return view('sponsor.create-campaign');
    }

    public function packages()
    {
        return view('sponsor.packages');
    }

    public function message()
    {
        return view('sponsor.message');
    }

    public function addToFavorite(Request $request)
    {              
        $sponsor = $request->sponsor;
        $creator = $request->creator;

        $creator = UserCreator::where(['user_id' => $request->user_id, 'creator_id' => $request->creator_id])->delete();

        if ($request->status == 1) {
            UserCreator::create(['user_id' => $request->user_id, 'creator_id' => $request->creator_id]);
            return  ['success'=> true, 'message' => 'Added to favorites successfully!'];
        }

        return  ['success'=> true, 'message' => 'Removed from favorites successfully!'];
    }


    public function profileSave(Request $request, $id)
    {
        $input = $request->except('_token');

        $creator = User::find($id);

        if($request->hasfile('avatar')){

            if(isset($creator->avatar)){
                $path   = 'public/uploads/sponsors/'.$creator->avatar;
                Storage::delete($path);
            }

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/sponsors/', $name, 'public');

            $input['avatar'] = $name;
        }else{
            unset($input['avatar']);
        }

        User::find($id)->update($input);

        return redirect()->route('account-setting', ['tab' => 2])->with('success', 'Data updated successfully');
    }   

    public function Thankyou(Request $request)
    {
        if(Session::get('payment_link_id')){

             Earning::where('transaction_id', Session::get('payment_link_id'))->update([
                    'status' => 1,
                ]);     
        }
        return view('sponsor.thankyou');
    }

}
