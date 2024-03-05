<?php

namespace App\Http\Controllers;

use App\Models\HomePageReview;
use App\Models\HomePageService;
use App\Models\InformationPageManagement;
use App\Models\HomePageSetting;
use App\Models\Category;
use App\Models\User;
use App\Models\Review;
use App\Models\Brand;
use App\Models\ChatMessage;
use App\Models\WebhookResponse;
use App\Models\Enquiry;
use App\Models\SearchKeyword;
use App\Models\State;
use App\Models\Faq;
use App\Models\Blog;
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

        ini_set('max_execution_time', 3600);
        set_time_limit(3600);
        SitemapGenerator::create('http://localhost:8000/')->writeToFile(public_path('sitemap.xml'));
    }


    public function profileshow(){
        return view('frontend.profileshow');
    }



    public function campaign(){
        return view('frontend.campaign');
    }

    public function support(){
        return view('frontend.support');
    }

    public function becomeStatePartner(){
        return view('frontend.become-state-partner');
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


    public function saveBecomeStatePartner(Request $request)
    {           
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],
        ]);

        $input = $request->except('_token');

        $product = Enquiry::create($input);

        return redirect()->back()->with('message', 'Enquiry submitted successfully!');
    }

}
