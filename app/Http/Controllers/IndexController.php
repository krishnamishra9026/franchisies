<?php

namespace App\Http\Controllers;

use App\Models\HomePageReview;
use App\Models\HomePageService;
use App\Models\InformationPageManagement;
use App\Models\HomePageSetting;
use App\Models\Creator;
use App\Models\Category;
use App\Models\User;
use App\Models\Review;
use App\Models\Brand;
use App\Models\ChatMessage;
use App\Models\WebhookResponse;
use App\Models\UserCreator;
use App\Models\CreatorCreator;
use App\Models\CreatorPricing;
use App\Models\CreatorShowcaseWork;
use App\Models\CreatorClientLogo;
use App\Models\Enquiry;
use App\Models\SearchKeyword;
use App\Models\State;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\CreatorVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\SitemapGenerator;
use Auth;
use Illuminate\Support\Facades\Http;
use Image;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){

        $reviews = HomePageReview::latest()->take(5)->get();

        $services = HomePageService::latest('sort_order')->take(5)->get();
        $settings = HomePageSetting::first();
        $brands = Brand::where('status', 1)->inRandomOrder()->take(12)->get();

        $responses = collect();

        $faqs = Faq::where('status', 1)->orderBy('sort_order', 'asc')->take(5)->get();

        return view('frontend.welcome', compact('reviews', 'services', 'settings', 'brands', 'responses', 'faqs'));
    }

    public function generateSiteMap()
    {

        ini_set('max_execution_time', 3600); // 3600 seconds = 60 minutes
set_time_limit(3600);

        SitemapGenerator::create('http://localhost:8000/')->writeToFile(public_path('sitemap.xml'));
    }


    public function profileshow(){
        return view('frontend.profileshow');
    }

    public function marketplace(){
        return view('frontend.marketplace');
    }

    public function campaign(){
        return view('frontend.campaign');
    }

    public function support(){
        return view('frontend.support');
    }

    public function join(){
        $categories = Category::get(['name', 'id']);
        return view('frontend.join', compact('categories'));
    }

    public function faq(){
        $faqs = Faq::where('status', 1)->orderBy('sort_order', 'asc')->get();
        return view('frontend.faq', compact('faqs'));
    }


    public function blogs(){
        $blogs = Blog::where('status', 1)->orderBy('sort_order', 'asc')->get();
        return view('frontend.blogs', compact('blogs'));
    }


    public function blog($id){
        $blog = Blog::where('id', $id)->orderBy('sort_order', 'asc')->first();
        return view('frontend.blog', compact('blog'));
    }

    public function ppc(){
        return view('frontend.ppc');
    }

    public function sitemap(){
        return view('frontend.sitemap');
    }

    public function page($slug)
    {
        $information = InformationPageManagement::where('slug', $slug)->first();

        if (!$information) {
            abort('404');
        }

        return view('frontend.page',compact('information'));
    }


    public function saveContactUs(Request $request)
    {
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],
            'query'               => ['required'],
        ]);

        $input = $request->except('_token');

        $input['user_type'] = '';
        $input['subject'] = '';

        $product = Enquiry::create($input);

        return redirect()->back()->with('message', 'Enquiry submitted successfully!');
    }


    public function saveJoinUs(Request $request)
    {              
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],
        ]);

        $input = $request->except('_token');

        $product = Enquiry::create($input);

        return redirect()->back()->with('message', 'Enquiry submitted successfully!');
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
        $sender_id = auth()->user()->id;

        if ($receiver_id || !empty($receiver_id)) {

            $conversation = new ChatMessage;
            $conversation->user_id = auth()->user()->id;
            $conversation->message = $request->message;
            $conversation->message_to = $receiver_id;
            $conversation->message_from = $sender_id;
            $conversation->sender = 'sponsor';
            $conversation->receiver = 'creator';
            $conversation->sender_reseptent = 'Sponsor_'.$sender_id.'Creator_'.$receiver_id;
            $conversation->message = $request->message;
            $conversation->flex = ( Auth::user() == null) ? 0 : 1;
            $conversation->save();
        }

        return  ['success'=> true, 'message' => 'Thanks for the enquiry, Creator will get in touch with you soon!'];
    }


    public function viewProfileBySlug($slug)
    {
        $profile =  Creator::where('slug', $slug)->first();

        if(!$profile){
            abort('404');
        }

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

        return view('sponsor.profileshow',compact('profile', 'pricings', 'showcase_works', 'client_logos', 'reviews', 'review_avg'));
    }

    public function viewProfile($id)
    {
        $profile =  Creator::where('id', $id)->first();

        if (!empty($profile->slug)) {
            return redirect()->route('profileviewslug', $profile->slug);
        }else{

            $g_slug = Str::slug($profile->firstname.' '.$profile->lastname.' '.$profile->state.' '.$profile->country);
            $check_slug = Creator::where('firstname', $profile->firstname)->where('lastname', $profile->lastname)->where('id', '!=', $profile->id)->count();
            if ($check_slug > 0) {
                Creator::where('id', $id)->update(['slug' => Str::slug($profile->firstname.' '.$profile->lastname. ('0'.($check_slug)).' '.$profile->state.' '.$profile->country)]);
            } else {
                Creator::where('id', $id)->update(['slug' => $g_slug]);
            };
            $profile =  Creator::where('id', $id)->first();
            return redirect()->route('profileviewslug', $profile->slug);
        }

        $reviews = Review::latest()->where(['user_type' => 'profile', 'user_id' => $profile->id, 'status' => 1])->paginate(10);

        $review_avg = Review::latest()->where(['user_type' => 'Creator', 'user_id' => $profile->id, 'status' => 1])->avg('rating');

        $review_avg = round($review_avg, 1);

        $pricings = CreatorPricing::where('creator_id', $id)->get();
        $showcase_works = CreatorShowcaseWork::where('creator_id', $id)->get();
        $client_logos = CreatorClientLogo::where('creator_id', $id)->get();

        if (auth()->user() && auth()->user()->id) {
        $profile->favorite = 0;
            $count = UserCreator::where('creator_id',$profile->id)->where('user_id',auth()->user()->id)->count();

            if ($count) {
                $profile->favorite = 1;
            }
        }

        $profile->badge_ids = json_decode($profile->badge_ids);

        return view('sponsor.profileshow',compact('profile', 'pricings', 'showcase_works', 'client_logos', 'reviews', 'review_avg'));
    }

    public function saveReview(Request $request)
    {
        $request->validate([
            'subject'              => ['required'],
            'rating'               => ['required'],
        ]);

        $input = $request->except('_token');

        $creator = Creator::where('id', $request->user_id)->first();

        $input['author'] = auth()->user()->first_name.' '.auth()->user()->last_name;
        $input['user_type'] = 'Creator';
        $input['status'] = 0;
        $input['sponsor_id'] = auth()->user()->id;

        $product = Review::create($input);

        $reviews = Review::where(['user_type' => 'Creator'])->get();

        $creators = Creator::with('reviews')->where('id', $request->user_id)->get();

        foreach ($creators as $key => $creator) {
            if ($creator->reviews && $creator->reviews->count()) {
                Creator::where('id', $creator->id)->update(['avg_rating' => round($creator->reviews->avg('rating'))]);
            }else{
                continue;
            }
        }

        return  ['success'=> true, 'message' => 'Thank you for submitting the review, We will verify and post the content creator profile. !'];

        return redirect()->back()->with('success', 'Thank you for submitting the review, We will verify and post the content creator profile.!');
    }

    public function fetchStates(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["state", "id"]);
        return response()->json($data);
    }

    public function getSearchKeywords(Request $request)
    {

        if ($request->ajax()) {
            return SearchKeyword::select("keyword as value", "id")
                ->where('keyword', 'LIKE', '%' . $request->get('search') . '%')
                ->get();
        }
    }

    public function getSearchCity(Request $request)
    {
        if ($request->ajax()) {
            return Creator::distinct('city')->select("city as value")
                ->where('city', 'LIKE', '%' . $request->get('search') . '%')
                ->get();
        }
    }

    public function getSearchCitySposnor(Request $request)
    {
        if ($request->ajax()) {
            return User::distinct('city')->select("city as value")
                ->where('city', 'LIKE', '%' . $request->get('search') . '%')
                ->get();
        }
    }

    public function suggestions()
    {
        return view('frontend.disqus-comment');
    }

    public function sendEmail()
    {
        $token = Str::random(64);
        return view('emails.creator.emailVerificationEmail', compact('token'));
    }

    public function sendEmailCreator()
    {
        $token = Str::random(64);
        return view('emails.emailVerificationEmail', compact('token'));
    }

    public function socialContentWebhook(Request $request)
    {
        $get_data = $request->getContent();
        $get_data = json_decode($get_data, true);
        $input = json_decode(file_get_contents('php://input'), true);

        $response = WebhookResponse::create([
            'status'        => 1,
            'name'    => 'messanger',
            'data' => json_encode($get_data)
        ]);

        $response = WebhookResponse::create([
            'status'        => 1,
            'name'    => 'data',
            'data' => $input
        ]);

        echo '<pre>'; print_r($input); echo '</pre>';
         Log::info('Showing the user profile for user:'. $input);
         Log::info('Showing the user profile for user:'. json_encode($request->all()));
        echo '<pre>'; print_r($request->all()); echo '</pre>'; exit();
    }

}
