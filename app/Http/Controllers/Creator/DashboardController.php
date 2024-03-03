<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;

use App\Models\AppSetting;
use App\Models\Creator;
use App\Models\Campaign;
use App\Models\Enquiry;
use App\Models\Review;
use App\Models\User;
use App\Models\Badge;
use App\Models\UserCreator;
use App\Models\CreatorCreator;
use App\Models\Earning;
use App\Models\CreatorPricing;
use App\Models\CreatorShowcaseWork;
use App\Models\PromoCode;
use App\Models\CreatorClientLogo;
use App\Models\CreatorContentType;
use App\Models\CreatorDashboardSetting;
use App\Models\CreatorCategory;
use App\Models\CreatorTag;
use App\Models\ChatMessage;
use App\Models\InformationPageManagement;
use Storage;
use Session;
use Stripe;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function favorites()
    {
        $creator = Creator::with('creators')->find(auth()->guard('creator')->user()->id);              
        $favorites = $creator->creators;
        return view('creator.favorites', compact('favorites'));
    }

    public function index()
    {
        $app_setting =  AppSetting::where('creator_id', auth()->guard('creator')->id())->first();
        $creator_setting =  CreatorDashboardSetting::first();
        $creator =  Creator::where('id', auth()->guard('creator')->id())->first();
        // $featureds = Creator::where('featured', 1)->take(5)->get();
        $featureds = Creator::with('showCaseData', 'pricingData')->latest('updated_at')->where('featured', 1)->take(5)->get();

        $pricings = CreatorPricing::where('creator_id', auth()->guard('creator')->id())->get();
        $showcase_works = CreatorShowcaseWork::where('creator_id', auth()->guard('creator')->id())->get();
        $client_logos = CreatorClientLogo::where('creator_id', auth()->guard('creator')->id())->get();
        $campaigns = Campaign::orderBy('id', 'desc')->get();

        $campaigns = Campaign::with('sponsorData')->inRandomOrder()->whereHas('sponsorData', function($query) {
            $query->whereNotNull('badge_ids');
        })->take(10)->get();

        $sender_id = auth()->user()->id;

        $chats = ChatMessage::latest('created_at')->where(['receiver' => 'Creator', 'message_to' => $sender_id])->groupBy('message_from')->get(['message_from', 'id', 'created_at']);

        foreach ($chats as $key => $chat) {
            $user = User::where('id', $chat->message_from)->first();
            $message = ChatMessage::latest()->where('message_from', $chat->message_from)->value('message');
            $chats[$key]->user = $user;
            $chats[$key]->message = $message;
        }

        /*if ($app_setting && $app_setting->instagram_username) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://i.instagram.com/api/v1/users/web_profile_info/?username='.$app_setting->instagram_username,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'User-Agent: Instagram 76.0.0.15.395 Android (24/7.0; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890; en_US; 138226743)',
                    'Cookie: csrftoken=CEEVCtDSSD9k7G3G0rhD9J9HV9Zmll3l; ig_did=DA6F0181-1F49-4E93-9604-30C849DB59C4; ig_nrcb=1; mid=ZORABgAEAAEVfzXhCYNqa1PISV3X'
                ),
            ));

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }

            curl_close($curl);

            if (isset($error_msg)) {
                echo "<pre>";print_r($error_msg);"</pre>";exit;
            }

            $res_data = json_decode($response, true);

            if ($res_data) {

                $follower_count = $res_data['data']['user']['edge_followed_by']['count'];

                Creator::where('id', auth()->guard('creator')->id())->update(['instagram_subscribers_or_followers' => $follower_count]);
            }

        }*/


        if ($app_setting && $app_setting->youtube_api_key) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=statistics&forUsername=true&key='.$app_setting->youtube_api_key,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
          ));

            $response = curl_exec($curl);

            curl_close($curl);

            $res_data = json_decode($response, true);

            $follower_count = $res_data['items'][0]['statistics']['subscriberCount'];

            Creator::where('id', auth()->guard('creator')->id())->update(['youtube_subscribers_or_followers' => $follower_count]);

        }


        /*if ($app_setting && $app_setting->tiktok_license_key) {

            $follower_count = Creator::where('id', auth()->guard('creator')->id())->value('tiktok_subscribers_or_followers');

            if ($follower_count <= 0) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://nextpost.tech/tiktok-api/getUserInfo?query='.$app_setting->tiktok_username.'&license_key='.$app_setting->tiktok_license_key,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                $res_data = json_decode($response, true);

                $follower_count = $res_data['tiktok']['user']['follower_count'];

                Creator::where('id', auth()->guard('creator')->id())->update(['tiktok_subscribers_or_followers' => $follower_count]);

            }
        }*/

        return view('creator.dashboard.dashboard', compact('creator', 'featureds', 'campaigns','pricings', 'showcase_works', 'client_logos', 'chats', 'creator_setting'));
    }


    public function saveContactUs(Request $request)
    {
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],
            'message'               => ['required'],
        ]);

        $input = $request->except('_token');

        $input['user_type'] = 'Creator';
        $input['subject'] = $request->make_offer;
        $input['query'] = $request->message;

        $product = Enquiry::create($input);

        return  ['success'=> true, 'message' => 'Enquiry submitted successfully!'];
    }

    public function saveReview(Request $request)
    {
        $request->validate([
            'subject'              => ['required'],
            'rating'               => ['required'],
        ]);

        $input = $request->except('_token');

        $creator = Creator::where('id', $request->user_id)->first();

        $input['author'] = $creator->firstname.' '.$creator->lastname;
        $input['user_type'] = 'Creator';

        $product = Review::create($input);

        return  ['success'=> true, 'message' => 'Enquiry submitted successfully!'];

        return redirect()->back()->with('success', 'Enquiry submitted successfully!');
    }

    public function page($slug)
    {
        $information = InformationPageManagement::where('slug', $slug)->first();

        return view('creator.page',compact('information'));
    }

    public function profileSave(Request $request, $id)
    {

        if ($request->tab == 1) {
            $request->validate([
                'firstname'  => ['required'],
                'lastname'  => ['required'],
                'username'  => ['required'],
            ]);

            $input = $request->except('_token');

            $creator = Creator::find($id);

            if($request->hasfile('avatar')){

                if(isset($creator->avatar)){
                    $path   = 'public/uploads/creators/'.$creator->avatar;
                    Storage::delete($path);
                }

                $image      = $request->file('avatar');

                $name       = $image->getClientOriginalName();

                $image->storeAs('uploads/creators/', $name, 'public');

                $input['avatar'] = $name;
            }else{
                unset($input['avatar']);
            }

            Creator::find($id)->update($input);

            return redirect()->route('creator.account-setting',['tab' => 2]);
        }


        if ($request->tab == 2) {
            $request->validate([
                'city'  => ['required']
            ]);

            $input = $request->except('_token');

            $creator = Creator::find($id);

            Creator::find($id)->update($input);

            return redirect()->route('creator.account-setting',['tab' => 3]);
        }


        if ($request->tab == 3) {

            return redirect()->route('creator.upgrades');
        }

    }

    public function suggestions()
    {
        return view('creator.disqus-comment');
    }


    public function profileServiceSave(Request $request, $id)
    {
        if ($request->tab == 1) {
            $request->validate([
                'talent_title'  => ['required']
            ]);

            $input = $request->except('_token');

            Creator::find($id)->update($input);

            return redirect()->route('creator.my-services',['tab' => 2]);
        }


        if ($request->tab == 2) {

            CreatorContentType::where(['creator_id' => $id])->delete();
            if($request->content_type && count($request->content_type)){
                foreach ($request->content_type as $key => $content_type) {
                    CreatorContentType::create(['content_type_id' => $content_type, 'creator_id' => $id]);
                }
            }

            CreatorCategory::where(['creator_id' => $id])->delete();
            if($request->category && count($request->category)){
                foreach ($request->category as $key => $category) {
                    CreatorCategory::create(['category_id' => $category, 'creator_id' => $id]);
                }
            }

            CreatorTag::where(['creator_id' => $id])->delete();
            if($request->tag && count($request->tag)){
                foreach ($request->tag as $key => $tag) {
                    CreatorTag::create(['tag_id' => $tag, 'creator_id' => $id]);
                }
            }

            return redirect()->route('creator.my-services',['tab' => 3]);
        }


        if ($request->tab == 3) {


            $showcase_work_count = CreatorShowcaseWork::where('creator_id', $id)->count();

            if($showcase_work_count < 4){
                return redirect()->route('creator.my-services',['tab' => 3])->with('error', 'Please upload atleast 4 assets to save and continue');
            }

            $work_ids =[];

            if($request->addMoreInputFields){

                foreach ($request->addMoreInputFields as $key => $work) {

                    if (isset($work['id'])) {
                        array_push($work_ids, $work['id']);
                    }
                }

                CreatorShowcaseWork::whereNotIn('id', $work_ids)->delete();

                foreach ($request->addMoreInputFields as $key => $work) {


                    if (isset($work['id'])) {

                        if (!empty($work['image_video'])) {
                            $image      = $work['image_video'];

                            $name       = $image->getClientOriginalName();

                            $image->storeAs('uploads/creators/service/showcase/', $name, 'public');

                            CreatorShowcaseWork::where('id', $work['id'])->update([
                                'image_video' => $name,
                            ]);
                        }else{
                            continue;
                        }

                    }else{

                        if(isset($work['image_video'])){


                            $image      = $work['image_video'];

                            $name       = $image->getClientOriginalName();

                            $image->storeAs('uploads/creators/service/showcase/', $name, 'public');

                            CreatorShowcaseWork::create([
                                'creator_id' => $creator->id,
                                'image_video' => $name,
                            ]);
                        }

                    }
                }

            }



            $logo_ids =[];

            if($request->addMoreBrands){



                foreach ($request->addMoreBrands as $key => $logo) {

                    if (isset($logo['id'])) {
                        array_push($logo_ids, $logo['id']);
                    }
                }

                CreatorClientLogo::whereNotIn('id', $logo_ids)->delete();

                foreach ($request->addMoreBrands as $key => $logo) {


                    if (isset($logo['id'])) {

                        if (!empty($logo['image'])) {
                            $image      = $logo['image'];

                            $name       = $image->getClientOriginalName();

                            $image->storeAs('uploads/creators/service/brands/', $name, 'public');

                            CreatorClientLogo::where('id', $logo['id'])->update([
                                'image' => $name,
                            ]);
                        }else{
                            continue;
                        }

                    }else{

                        if(isset($logo['image'])){


                            $image      = $logo['image'];

                            $name       = $image->getClientOriginalName();

                            $image->storeAs('uploads/creators/service/brands/', $name, 'public');

                            CreatorClientLogo::create([
                                'creator_id' => $creator->id,
                                'image' => $name,
                            ]);
                        }

                    }
                }
            }

            return redirect()->route('creator.my-services',['tab' => 4]);
        }


        if ($request->tab == 4) {

            $creator = Creator::find($id);

            CreatorPricing::where('creator_id', $id)->delete();

            if ($request->addMorePricing) {

                foreach ($request->addMorePricing as $key => $pricing) {

                    if ($key == 0 && !empty($pricing['price'])) {
                        Creator::where('id', $creator->id)->update(['price' => $pricing['price']]);
                    }

                    if (empty($pricing['service_detail']) || empty($pricing['delivery_time']) || empty($pricing['social_platform']) || empty($pricing['price'])) {
                        continue;
                    }

                    CreatorPricing::create([
                        'creator_id' => $id,
                        'service_detail' => $pricing['service_detail'],
                        'delivery_time' => $pricing['delivery_time'],
                        'social_platform' => json_encode($pricing['social_platform']),
                        'price' => $pricing['price'],
                    ]);
                }
            }
            return redirect()->route('creator.my-services',['tab' => 5]);
        }

        return redirect()->route('creator.dashboard')->with('success', 'Data updated successfully');
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
                        'url' => route('creator.thankyou'),
                    ],
                    'type' => 'redirect'
                ]
            ]);

        }                

        if(isset($payment_link_response) && $payment_link_response != ''){                    
            $payment_link_id = $payment_link_response['id'];     

            Earning::create([
                'transaction_id' => $payment_link_id,
                'user_type' => 'Creator',
                'user_id' => auth()->user()->id,
                'username' => auth()->user()->firstname.' '.auth()->user()->lastname,
                'amount' => $total,
                'badges' => json_encode(Session::get('ids')),
                'status' => 0,
            ]);     

            Session::put(['payment_link_id' => $payment_link_id]);           

        }


        return redirect()->away($payment_link_response['url']);

    }

    public function uploadShowcaseWork(Request $request)
    {
        if(isset($request['image'])){


            $image = $request->file('image');
            $imagename       = 'original_'.$image->getClientOriginalName();

            $image->storeAs('uploads/creators/service/showcase/original/', $imagename, 'public');

            $input['imagename']       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/creators/service/showcase');
            $img = Image::make($image->path());
            $img->resize(310, 330, function ($constraint) {
                // $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = storage_path('/app/public/uploads/images');
            $image->move($destinationPath, $input['imagename']);            

            CreatorShowcaseWork::create([
                'creator_id' => auth()->user()->id,
                'image_video' => $input['imagename'],
            ]);
        }
        return "uploaded";
    }

    public function uploadClientLogo(Request $request)
    {
        if(isset($request['image'])){

            $image      = $request['image'];

            $imagename       = $image->getClientOriginalName();

            /*$new_image = Image::make($image->getRealPath());
            if($new_image != null){
                $image_width= $new_image->width();
                $image_height= $new_image->height();
                $new_width= 400;
                $new_height= 400;

                $new_image->resize($new_width, $new_height, function    ($constraint) {
                    $constraint->aspectRatio();
                });

                $store_image = $new_image->save(public_path('storage/uploads/creators/service/brands/' .$imagename));

                $store_image = Storage::put('storage/uploads/creators/service/brands/' .$imagename, (string) $image);
            }*/


            $image->storeAs('uploads/creators/service/brands/', $imagename, 'public');

            CreatorClientLogo::create([
                'creator_id' => auth()->user()->id,
                'image' => $imagename,
            ]);
        }
        return "uploaded";
    }

    public function uploadShowcaseExample(Request $request)
    {
        if(isset($request['image'])){


            $avatar = Creator::findOrFail(auth()->user()->id);

            if(Storage::exists('public/uploads/creators/service/showcase/example/'.$avatar->showcase_example)){
                Storage::delete('public/uploads/creators/service/showcase/example/'.$avatar->showcase_example);
            }

            $image      = $request['image'];

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/creators/service/showcase/example/', $name, 'public');

            Creator::where('id',auth()->user()->id)->update([
                'showcase_example' => $name,
            ]);
        }
        return "uploaded";
    }

    public function deleteShowcaseWork($id)
    {
        $avatar = CreatorShowcaseWork::findOrFail($id);

        /*if(Storage::exists('public/uploads/creators/service/showcase/'.$avatar->image_video)){
            Storage::delete('public/uploads/creators/service/showcase/'.$avatar->image_video);
        }*/

        CreatorShowcaseWork::where('id',$id)->delete();

        return redirect(route('creator.my-services').'?tab=3');
    }


    public function upgrades()
    {
        $badge_ids = Creator::where('id', auth()->guard('creator')->user()->id)->value('badge_ids');
        $badge_ids = json_decode($badge_ids);
        $badges = Badge::latest()->where(['user_type' => 'Creator', 'status' =>1])->get();
        return view('creator.upgrades', compact('badges', 'badge_ids'));
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
            return redirect()->route('creator.upgrades');
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

        Creator::where('id', auth()->guard('creator')->user()->id)->update(['badge_ids' => json_encode($selected_ids)]);

        if((isset($ids)) && (count($ids) > 0)) {
            Creator::where('id', auth()->user()->id)->update(['badge_sort' => true]);
        }

        return view('creator.paid-service', compact('total', 'ids', 'badges', 'sub_total', 'coupon_total', 'code'));
    }

    public function support(){
        return view('creator.support');
    }

    public function applyCoupon(Request $request)
    {
        $sub_total = $request->sub_total;
        $total = $request->total;

        $promo_code = PromoCode::where('code', $request->coupon)->whereDate('valid_from_date', '<=' , date('Y-m-d'))->whereDate('valid_to_date', '>=' , date('Y-m-d'))->first();


        $coupon_total = 0;

        $ids = $request->ids;

        $badges = Badge::whereIn('id', Session::get('ids'))->get();

        $code = $request->coupon;

        if($promo_code){

            if ($promo_code->type == 'fixed') {
                $coupon_amt = $promo_code->value;
                $coupon_total = $request->total - $coupon_amt;
            }else{
                $coupon_amt = $promo_code->value;
                $coupon_total = round(($request->total*$coupon_amt)/100, 2);
            }
            PromoCode::where('code', $request->coupon)->increment('used',1);

        }else{
            $error = 'Coupon not found';
            return view('creator.paid-service', compact('total', 'ids', 'badges', 'coupon_total', 'sub_total', 'code', 'error'));
        }


        $total = $coupon_total;

        $coupon_total = $coupon_amt;

        Session::put(['total' =>$total]);

        return view('creator.paid-service', compact('total', 'ids', 'badges', 'coupon_total', 'sub_total', 'code'));
    }


    public function paidService()
    {
        return view('creator.paid-service');
    }

    public function Thankyou()
    {
        if(Session::get('payment_link_id')){

             Earning::where('transaction_id', Session::get('payment_link_id'))->update([
                    'status' => 1,
                ]);     
        }
        
        return view('creator.thankyou');
    }

    public function deleteClientLogo($id)
    {
        $avatar = CreatorClientLogo::findOrFail($id);

        /*if(Storage::exists('public/uploads/creators/service/brands/'.$avatar->image)){
            Storage::delete('public/uploads/creators/service/brands/'.$avatar->image);
        }*/

        CreatorClientLogo::where('id',$id)->delete();

        return redirect(route('creator.my-services').'?tab=3');
    }

    public function saveQuote(Request $request)
    {
        $request->validate([
            'message'               => ['required'],
        ]);

        $input = $request->except('_token');

        $input['subject'] = '';
        $input['query'] = $input['message'];

        $product = Enquiry::create($input);

        $receiver_id = $request->user_id;
        $sender_id = auth()->guard('creator')->id();

        if ($receiver_id || !empty($receiver_id)) {

            $conversation = new ChatMessage;
            $conversation->user_id = auth()->guard('creator')->id();
            $conversation->message = $request->message;
            $conversation->message_to = $receiver_id;
            $conversation->message_from = $sender_id;
            $conversation->sender = 'creator';
            $conversation->receiver = 'sponsor';
            $conversation->sender_reseptent = 'Creator_'.$sender_id.'Sponsor_'.$receiver_id;
            $conversation->message = $request->message;
            $conversation->flex = ( auth()->guard('creator')->user() == null) ? 0 : 1;
            $conversation->save();
        }

        return  ['success'=> true, 'message' => 'Thanks for the enquiry, Sponsor will get in touch with you soon!'];
    }


    public function viewProfileBySlug($slug)
    {
        $profile =  Creator::where('slug', $slug)->first();

        $reviews = Review::latest()->where(['user_type' => 'Creator', 'user_id' => $profile->id, 'status' => 1])->paginate(10);

        $review_avg = Review::latest()->where(['user_type' => 'Creator', 'user_id' => $profile->id, 'status' => 1])->avg('rating');

        $review_avg = round($review_avg, 1);

        $pricings = CreatorPricing::where('creator_id', $profile->id)->get();
        $showcase_works = CreatorShowcaseWork::where('creator_id', $profile->id)->get();
        $client_logos = CreatorClientLogo::where('creator_id', $profile->id)->get();

        if (auth()->user() && auth()->user()->id) {
        $profile->favorite = 0;
            $count = UserCreator::where('creator_id',$profile->id)->where('user_id',auth()->user()->id)->count();

            if ($count) {
                $profile->favorite = 1;
            }
        }

        $profile->badge_ids = json_decode($profile->badge_ids);

        return view('creator.profileshow',compact('profile', 'pricings', 'showcase_works', 'client_logos', 'reviews', 'review_avg'));
    }

    public function viewProfile($id)
    {
        $profile =  Creator::where('id', $id)->first();


        if (!empty($profile->slug)) {
            return redirect()->route('creator.profileviewslug', $profile->slug);
        }else{

            $g_slug = Str::slug($profile->firstname.' '.$profile->lastname.' '.$profile->state.' '.$profile->country);
            $check_slug = Creator::where('firstname', $profile->firstname)->where('lastname', $profile->lastname)->where('id', '!=', $profile->id)->count();
            if ($check_slug > 0) {
                Creator::where('id', $id)->update(['slug' => Str::slug($profile->firstname.' '.$profile->lastname. ('0'.($check_slug)).' '.$profile->state.' '.$profile->country)]);
            } else {
                Creator::where('id', $id)->update(['slug' => $g_slug]);
            };
            $profile =  Creator::where('id', $id)->first();
            return redirect()->route('creator.profileviewslug', $profile->slug);
        }


        $reviews = Review::latest()->where(['user_type' => 'Creator', 'user_id' => $profile->id, 'status' => 1])->paginate(10);

        $review_avg = Review::latest()->where(['user_type' => 'Creator', 'user_id' => $profile->id, 'status' => 1])->avg('rating');

        $review_avg = round($review_avg, 1);

        $pricings = CreatorPricing::where('creator_id', $id)->get();
        $showcase_works = CreatorShowcaseWork::where('creator_id', $id)->get();
        $client_logos = CreatorClientLogo::where('creator_id', $id)->get();


        if (auth()->guard('creator')->user() && auth()->guard('creator')->user()->id) {
            $count = CreatorCreator::where('creator_id',$profile->id)->where('user_id',auth()->guard('creator')->user()->id)->count();

            if ($count) {
                $profile->favorite = 1;
            }
        }

        $profile->badge_ids = json_decode($profile->badge_ids);
        
        return view('creator.profileshow',compact('profile', 'pricings', 'showcase_works', 'client_logos', 'reviews', 'review_avg'));
    }

    public function addToFavorite(Request $request)
    {           
        $sponsor = $request->sponsor;
        $creator = $request->creator;

        $creator = CreatorCreator::where(['user_id' => $request->user_id, 'creator_id' => $request->creator_id])->delete();

        if ($request->status == 1) {
            CreatorCreator::create(['user_id' => $request->user_id, 'creator_id' => $request->creator_id]);
            return  ['success'=> true, 'message' => 'Added to favorites successfully!'];
        }
        return  ['success'=> true, 'message' => 'Removed from favorites successfully!'];
    }
}
