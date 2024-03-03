<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Creator;
use App\Models\User;
use App\Models\UserCreator;
use App\Models\CreatorCreator;
use App\Models\CreatorPricing;
use App\Models\Category;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\State;
use DB;

class MarketplaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function campaigns(Request $request)
    {
        $sponsors = User::get(['first_name', 'last_name', 'id']);
        $categories = Category::get(['name', 'id']);

        if($request->state){
            $country_id          = Country::where('country', $request->country)->value('id');
            $states             = State::where('country_id', $country_id)->get(['id', 'state']);
        }else{
            $states             = State::get(['id', 'state']);
        }

        $countries          = Country::get(['country', 'id']);

        $filter_status       = $request->input('filter_status');
        $filter_title        = $request->input('filter_title');
        $filter_sponsor      = $request->input('filter_sponsor');
        $filter_category     = $request->input('filter_category');
        $filter_date_from    = $request->input('filter_date_from');
        $filter_date_to      = $request->input('filter_date_to');

        $filter_max_price      = $request->input('max-price');
        $filter_min_price      = $request->input('min-price');

        if ($request->sortby) {

            if ($request->sortby == 'name-asc') {
                $campaigns = Campaign::where('status', 1)->orderBy('title', 'asc');
            }

            if ($request->sortby == 'name-desc') {
                $campaigns = Campaign::where('status', 1)->orderBy('title', 'desc');
            }

            if ($request->sortby == 'price-asc') {
                $campaigns = Campaign::where('status', 1)->orderBy('price', 'asc');
            }

            if ($request->sortby == 'price-desc') {
                $campaigns = Campaign::where('status', 1)->orderBy('price', 'desc');
            }

            if ($request->sortby == 'asc') {
                $campaigns = Campaign::where('status', 1)->orderBy('created_at', 'asc');
            }

            if ($request->sortby == 'desc') {
                $campaigns = Campaign::where('status', 1)->orderBy('created_at', 'desc');
            }

        }else{
            // $campaigns = Campaign::where('status', 1)->orderBy('id', 'desc');
            $campaigns = Campaign::with('sponsorData')->where('status', 1)->whereHas('sponsorData', function($query) {
                $query->orderBy(DB::raw('ISNULL(badge_ids), badge_ids'), 'ASC');
            });
        }

        if ($request->search) {

            $searchString = $request->input('search');

            $campaigns->where(  function($query) use($searchString) {
                $query->where('title', 'like', '%'.$searchString.'%')
                ->orWhereHas('categoryData', function ($query) use ($searchString){
                    $query->where('name', 'like', '%'.$searchString.'%');
                })->orWhereHas('contentTypeData', function ($query) use ($searchString){
                    $query->where('name', 'like', '%'.$searchString.'%');
                });
            });
        }

        if ($request->state) {

            $stateString = $request->input('state');

            $campaigns->whereHas('sponsorData', function ($query) use ($stateString){
                $query->with('stateData')->whereHas('stateData', function ($q) use ($stateString){
                    $q->where('state', 'like', '%'.$stateString.'%');
                });
            });
        }

        if ($request->country) {

            $countryString = $request->input('country');

            $campaigns->whereHas('sponsorData', function ($query) use ($countryString){
                $query->with('countryData')->whereHas('countryData', function ($q) use ($countryString){
                    $q->where('country', 'like', '%'.$countryString.'%');
                });
            });
        }

        if ($request->city) {

            $cityString = $request->input('city');

            $campaigns->whereHas('sponsorData', function ($query) use ($cityString){
                    $query->where('city', 'like', '%'.$cityString.'%');
            });
        }


        /*if ($filter_max_price && $filter_max_price>0 && $filter_min_price==0) {
            $campaigns->where('price', '<=', $filter_max_price);
        }*/


        if ($filter_max_price || $filter_min_price) {
            $campaigns->whereBetween('price', [$filter_min_price, $filter_max_price]);
        }

        if ($request->filter_title) {
            $campaigns->where('title', 'LIKE', '%' . $request->input('filter_title') . '%');
        }

        if ($request->filter_sponsor) {
            $campaigns->where('sponsor', $request->input('filter_sponsor'));
        }

        if (isset($request->filter_status)) {
            $campaigns->where('status', '=', $request->input('filter_status'));
        }

        if ($request->category) {
            $campaigns->whereIn('category', $request->input('category'));
        }


              // echo '<pre>'; print_r($campaigns->toSql()); echo '</pre>'; exit();
              

        if ($request->filter_date_from && $request->filter_date_to) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $campaigns->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $campaigns->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $campaigns->whereDate('created_at', '<=', $to);
        }

        $campaigns = $campaigns->paginate(15);    

        return view('creator.marketplace.campaigns', compact('campaigns', 'sponsors', 'categories', 'filter_status', 'filter_title', 'filter_sponsor', 'filter_category', 'filter_date_from', 'filter_date_to', 'countries', 'states'));
    }


    public function creatorsOld(Request $request)
    {
        $filter_status            = $request->input('filter_status');
        $filter_name              = $request->input('filter_name');
        $filter_email             = $request->input('filter_email');
        $filter_phone             = $request->input('filter_phone');
        $filter_date_from         = $request->input('filter_date_from');
        $filter_date_to           = $request->input('filter_date_to');

        if($request->state){
            $country_id          = Country::where('country', $request->country)->value('id');
            $states             = State::where('country_id', $country_id)->get(['id', 'state']);
        }else{
            $states             = State::get(['id', 'state']);
        }

        $countries          = Country::get(['country', 'id']);

        $categories = Category::get(['name', 'id']);

        if ($request->sortby) {
            if ($request->sortby == 'name-asc') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('firstname', 'asc');
            }

            elseif ($request->sortby == 'name-desc') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('firstname', 'desc');
            }else{

                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('id', 'desc');
            }

            if ($request->sortby == 'price-asc') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('price', 'asc');
            }

            if ($request->sortby == 'price-desc') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('price', 'desc');
            }

            if ($request->sortby == 'latest') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('created_at', 'desc');
            }

            if ($request->sortby == 'rating') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('avg_rating', 'desc');
            }

            if ($request->sortby == 'instagram-followers') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('instagram_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'youtube-followers') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('youtube_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'tiktok-followers') {
                $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('tiktok_subscribers_or_followers', 'desc');
            }
            
        }else{
            $creators = Creator::inRandomOrder()->where('status', 1)->orderBy('badge_sort', 'desc');
        }
              

        if ($request->filter_name) {
            $creators->where('firstname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('lastname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('username', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if ($request->search) {

            $searchString = $request->input('search');

            $creators->where(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $searchString . '%')
            ->orWhereHas('tags.tag', function ($query) use ($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            })->orWhereHas('categories.category', function ($query) use ($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            })->orWhereHas('content_types.content_type', function ($query) use ($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            })->orWhereHas('pricing_datas', function ($query) use ($searchString){
                $query->where('service_detail', 'like', '%'.$searchString.'%');
            });

        }

        if ($request->state) {

            $stateString = $request->input('state');

            $creators->whereHas('stateData', function ($query) use ($stateString){
                $query->where('state', 'like', '%'.$stateString.'%');
            });
        }

        if ($request->country) {

            $countryString = $request->input('country');

            $creators->whereHas('countryData', function ($query) use ($countryString){
                $query->where('country', 'like', '%'.$countryString.'%');
            });
        }

        if ($request->city) {
            $creators->where('city', 'LIKE', '%' . $request->city . '%');
        }

        if ($request->filter_username) {
            $creators->where('username', 'LIKE', '%' . $request->input('filter_username') . '%');
        }

        if (isset($request->filter_status)) {
            $creators->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_mobile) {
            $creators->where('phone', 'LIKE', '%' . $request->input('filter_phone') . '%');
        }

        if ($request->platform) {

            if(isset($request->platform[0]) && $request->platform[0] == 'youtube'){
                $creators->where('youtube', 1);
            }

            if(isset($request->platform[0]) && $request->platform[0] == 'tiktok'){
                $creators->where('tiktok', 1);
            }

            if(isset($request->platform[0]) && $request->platform[0] == 'instagram'){
                $creators->where('instagram', 1);
            }

            if(isset($request->platform[1]) && $request->platform[1] == 'youtube'){
                $creators->where('youtube', 1);
            }

            if(isset($request->platform[1]) && $request->platform[1] == 'tiktok'){
                $creators->where('tiktok', 1);
            }

            if(isset($request->platform[1]) && $request->platform[1] == 'instagram'){
                $creators->where('instagram', 1);
            }


            if(isset($request->platform[3]) && $request->platform[3] == 'youtube'){
                $creators->where('youtube', 1);
            }

            if(isset($request->platform[3]) && $request->platform[3] == 'tiktok'){
                $creators->where('tiktok', 1);
            }

            if(isset($request->platform[3]) && $request->platform[3] == 'instagram'){
                $creators->where('instagram', 1);
            }
        }


        if ($request->followers) {

            if(isset($request->followers[0]) && $request->followers[0] == '1k+'){
                $creators->where('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[0]) && $request->followers[0] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[0]) && $request->followers[0] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[0]) && $request->followers[0] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[0]) && $request->followers[0] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[0]) && $request->followers[0] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }


            if(isset($request->followers[1]) && $request->followers[1] == '1k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[1]) && $request->followers[1] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[1]) && $request->followers[1] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[1]) && $request->followers[1] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[1]) && $request->followers[1] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[1]) && $request->followers[1] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }


            if(isset($request->followers[2]) && $request->followers[2] == '1k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[2]) && $request->followers[2] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[2]) && $request->followers[2] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[2]) && $request->followers[2] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[2]) && $request->followers[2] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[2]) && $request->followers[2] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '1k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[3]) && $request->followers[3] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }


            if(isset($request->followers[4]) && $request->followers[4] == '1k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[4]) && $request->followers[4] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[4]) && $request->followers[4] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[4]) && $request->followers[4] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[4]) && $request->followers[4] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[4]) && $request->followers[4] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }


            if(isset($request->followers[5]) && $request->followers[5] == '1k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 1000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 1000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 1000);
            }

            if(isset($request->followers[5]) && $request->followers[5] == '10k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 10000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 10000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 10000);
            }

            if(isset($request->followers[5]) && $request->followers[5] == '20k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 20000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 20000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 20000);
            }

            if(isset($request->followers[5]) && $request->followers[5] == '50k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 50000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 50000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 50000);
            }

            if(isset($request->followers[5]) && $request->followers[5] == '100k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 100000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 100000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 100000);
            }

            if(isset($request->followers[5]) && $request->followers[5] == '500k+'){
                $creators->orWhere('instagram_subscribers_or_followers', '>=', 500000)
                ->orWhere('youtube_subscribers_or_followers', '>=', 500000)
                ->orWhere('tiktok_subscribers_or_followers', '>=', 500000);
            }
        }

        if ($request->rating) {
            $creators->whereIn('avg_rating', $request->input('rating'));
        }


        if ($request->category) {
            $creators->whereIn('category', $request->input('category'));
        }

        if ($request->filter_email) {
            $creators->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }


        if ($request->gender) {
            $creators->whereIn('gender', $request->gender);
        }

        if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $creators->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $creators->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $creators->whereDate('created_at', '<=', $to);
        }

        $creators = $creators->paginate(15);


        foreach ($creators as $key => $creator) {

            if ($creator->reviews && $creator->reviews->count()) {
                Creator::where('id', $creator->id)->update(['avg_rating' => round($creator->reviews->avg('rating'), 2)]);
            }

            $pricings = CreatorPricing::where('creator_id', $creator->id)->get();

            if ($pricings) {

                foreach ($pricings as $key => $pricing) {

                    if ($key == 0 && !empty($pricing->price)) {
                        Creator::where('id', $creator->id)->update(['price' => $pricing->price]);
                    }
                }
            }
            
            $creators[$key]->favorite = 0;
            if (auth()->user() && auth()->user()->id) {
                $count = UserCreator::where('creator_id',$creator->id)->where('user_id',auth()->user()->id)->count();

                if ($count) {
                    $creators[$key]->favorite = 1;
                }
            }
        }

        return view('creator.marketplace.creators', compact('creators', 'filter_status', 'filter_name', 'filter_email', 'filter_phone', 'filter_date_from', 'filter_date_to', 'categories', 'states', 'countries'));
    }

    public function creators(Request $request)
    {

        $countries          = Country::get(['id', 'country']);
        $categories         = Category::get(['id', 'name']);
       
        if($request->state){
            $country_id     = Country::where('country', $request->country)->value('id');
            $states         = State::where('country_id', $country_id)->get(['id', 'state']);
        }else{
            $states         = State::get(['id', 'state']);
        }

        $badged_creators    = Creator::where('status', true)->whereNotNull('badge_ids')->inRandomOrder()->pluck('id')
        ->toArray();

        $unbadged_creators  = Creator::where('status', true)->whereNull('badge_ids')->inRandomOrder()->pluck('id')
        ->toArray();

        $merged = array_merge($badged_creators, $unbadged_creators);
        $ids_ordered = implode(',', $merged);
       $creators = Creator::whereIn('id', $merged);

       
        if ($request->sortby) {
            if ($request->sortby == 'name-asc') {
                $creators = $creators->orderBy('firstname', 'asc');
            }

            if ($request->sortby == 'name-desc') {
                $creators = $creators->orderBy('firstname', 'desc');
            }

            if ($request->sortby == 'price-asc') {
                $creators = $creators->orderBy('price', 'asc');
            }

            if ($request->sortby == 'price-desc') {
                $creators = $creators->orderBy('price', 'desc');
            }

            if ($request->sortby == 'latest') {
                $creators = $creators->orderBy('created_at', 'desc');
            }

            if ($request->sortby == 'rating') {
                $creators = $creators->orderBy('avg_rating', 'desc');
            }

            if ($request->sortby == 'instagram-followers') {
                $creators = $creators->orderBy('instagram_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'youtube-followers') {
                $creators = $creators->orderBy('youtube_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'tiktok-followers') {
                $creators = $creators->orderBy('tiktok_subscribers_or_followers', 'desc');
            }

        }
       

        if ($request->search) {

            $searchString = $request->input('search');

            $creators->where(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $searchString . '%')
            ->orWhere('talent_title', 'LIKE', '%' . $searchString . '%')
            ->orWhereHas('tags.tag', function ($query) use ($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            })->orWhereHas('categoriesData', function ($query) use ($searchString){
                $query->where('categories.name', 'like', '%'.$searchString.'%');
            })->orWhereHas('pricing_datas', function ($query) use ($searchString){
                $query->where('service_detail', 'like', '%'.$searchString.'%');
            });
        }

        if ($request->state) {

            $stateString = $request->input('state');

            $creators->whereHas('stateData', function ($query) use ($stateString){
                $query->where('state', 'like', '%'.$stateString.'%');
            });
        }

        if ($request->country) {

            $countryString = $request->input('country');

            $creators->whereHas('countryData', function ($query) use ($countryString){
                $query->where('country', 'like', '%'.$countryString.'%');
            });
        }

        if ($request->city) {
            $creators->where('city', 'LIKE', '%' . $request->city . '%');
        }


        $filter_max_price      = $request->input('max-price');
        $filter_min_price      = $request->input('min-price');
        
        if ($filter_max_price || $filter_min_price) {
            $creators->whereBetween('price', [$filter_min_price, $filter_max_price]);
        }


        if ($request->platform) {

            $platforms = $request->platform;
            $results = $creators->where(  function($query) use($platforms) {                    
                foreach ($platforms as $key => $platform) {
                    if($key > 0){
                        $query->orWhere($platform.'_connected', 1);
                    }else{
                        $query->where($platform.'_connected', 1);
                    }
                }            
            });
        }


        if ($request->followers && !$request->platform) {

            foreach ($request->followers as $key => $followers) {

                $results = $creators->where(  function($query) use($followers) {
                    switch ($followers) {
                        case '50k+':
                        $follower = 50000;
                        break;

                        case '20k+':
                        $follower = 20000;
                        break;

                        case '1k+':
                        $follower = 1000;
                        break;

                        case '10k+':
                        $follower = 10000;
                        break;


                        case '100k+':
                        $follower = 100000;
                        break;

                        case '500k+':
                        $follower = 500000;
                        break;

                        default:
                        $follower = 10;
                        break;
                    }
                    return $query->where('instagram_subscribers_or_followers', '>=', $follower)
                    ->orWhere('youtube_subscribers_or_followers', '>=', $follower)
                    ->orWhere('tiktok_subscribers_or_followers', '>=', $follower);
                });
            }
        }

        if ($request->followers && $request->platform) {

            $platforms = $request->platform;

            foreach ($request->followers as $key => $followers) {

                $results = $creators->where(  function($query) use($followers, $platforms) {
                    switch ($followers) {
                        case '50k+':
                        $follower = 50000;
                        break;

                        case '20k+':
                        $follower = 20000;
                        break;

                        case '1k+':
                        $follower = 1000;
                        break;

                        case '10k+':
                        $follower = 10000;
                        break;


                        case '100k+':
                        $follower = 100000;
                        break;

                        case '500k+':
                        $follower = 500000;
                        break;

                        default:
                        $follower = 10;
                        break;
                    }

                    foreach ($platforms as $key => $platform) {
                        if ($key > 0) {
                            $query->orWhere($platform.'_subscribers_or_followers', '>=', $follower);
                        }else{
                            $query->where($platform.'_subscribers_or_followers', '>=', $follower);
                        }
                    }
                });
            }
        }


        if ($request->rating) {
            $creators->whereIn('avg_rating', $request->input('rating'));
        }

        if ($request->category) {
            $searchString = $request->category;                                

            $creators->whereHas('categoriesData', function ($query) use ($searchString){
                $query->whereIn('category_id', array_values($searchString));
            });
        }

        if ($request->gender) {
            $creators->whereIn('gender', $request->gender);
        }


        $creators = $creators->orderByRaw("FIELD(id, $ids_ordered)")->paginate(10);

        $cities = $creators->pluck('city')->toArray();

        $cities = array_values(array_filter($cities, fn($value) => !is_null($value) && $value !== ''));   


        foreach ($creators as $key => $creator) {
            $creators[$key]->favorite = 0;

            if ($creator->reviews && $creator->reviews->count()) {
                Creator::where('id', $creator->id)->update(['avg_rating' => round($creator->reviews->avg('rating'), 2)]);
            }

            $pricings = CreatorPricing::where('creator_id', $creator->id)->get();

            if ($pricings) {

                foreach ($pricings as $key1 => $pricing) {

                    if ($key1 == 0 && !empty($pricing->price)) {
                        Creator::where('id', $creator->id)->update(['price' => $pricing->price]);
                    }
                }
            }

            if (auth()->user() && auth()->user()->id) {
                $count = UserCreator::where('creator_id',$creator->id)->where('user_id',auth()->user()->id)->count();

                if ($count) {
                    $creators[$key]->favorite = 1;
                }
            }

            if (auth()->guard('creator')->user() && auth()->guard('creator')->user()->id) {
                $count = CreatorCreator::where('creator_id',$creator->id)->where('user_id',auth()->guard('creator')->user()->id)->count();

                if ($count) {
                    $creators[$key]->favorite = 1;
                }
            }
        }

        return view('creator.marketplace.creators', compact('creators', 'categories', 'states', 'countries', 'cities'));
    }

    public function category(Request $request, $slug)
    {
        $countries          = Country::get(['id', 'country']);
        $categories         = Category::get(['id', 'name']);
       
        if($request->state){
            $country_id     = Country::where('country', $request->country)->value('id');
            $states         = State::where('country_id', $country_id)->get(['id', 'state']);
        }else{
            $states         = State::get(['id', 'state']);
        }

        $badged_creators    = Creator::where('status', true)->whereNotNull('badge_ids')->inRandomOrder()->pluck('id')
        ->toArray();

        $unbadged_creators  = Creator::where('status', true)->whereNull('badge_ids')->inRandomOrder()->pluck('id')
        ->toArray();

        $merged = array_merge($badged_creators, $unbadged_creators);
        $ids_ordered = implode(',', $merged);
       $creators = Creator::whereIn('id', $merged);

       
        if ($request->sortby) {
            if ($request->sortby == 'name-asc') {
                $creators = $creators->orderBy('firstname', 'asc');
            }

            if ($request->sortby == 'name-desc') {
                $creators = $creators->orderBy('firstname', 'desc');
            }

            if ($request->sortby == 'price-asc') {
                $creators = $creators->orderBy('price', 'asc');
            }

            if ($request->sortby == 'price-desc') {
                $creators = $creators->orderBy('price', 'desc');
            }

            if ($request->sortby == 'latest') {
                $creators = $creators->orderBy('created_at', 'desc');
            }

            if ($request->sortby == 'rating') {
                $creators = $creators->orderBy('avg_rating', 'desc');
            }

            if ($request->sortby == 'instagram-followers') {
                $creators = $creators->orderBy('instagram_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'youtube-followers') {
                $creators = $creators->orderBy('youtube_subscribers_or_followers', 'desc');
            }

            if ($request->sortby == 'tiktok-followers') {
                $creators = $creators->orderBy('tiktok_subscribers_or_followers', 'desc');
            }

        }
       

        if ($request->search) {

            $searchString = $request->input('search');

            $creators->where(DB::raw("concat(firstname, ' ', lastname)"), 'LIKE', '%' . $searchString . '%')
            ->orWhere('talent_title', 'LIKE', '%' . $searchString . '%')
            ->orWhereHas('tags.tag', function ($query) use ($searchString){
                $query->where('name', 'like', '%'.$searchString.'%');
            })->orWhereHas('categoriesData', function ($query) use ($searchString){
                $query->where('categories.name', 'like', '%'.$searchString.'%');
            })->orWhereHas('pricing_datas', function ($query) use ($searchString){
                $query->where('service_detail', 'like', '%'.$searchString.'%');
            });
        }

        if ($request->state) {

            $stateString = $request->input('state');

            $creators->whereHas('stateData', function ($query) use ($stateString){
                $query->where('state', 'like', '%'.$stateString.'%');
            });
        }

        if ($request->country) {

            $countryString = $request->input('country');

            $creators->whereHas('countryData', function ($query) use ($countryString){
                $query->where('country', 'like', '%'.$countryString.'%');
            });
        }

        if ($request->city) {
            $creators->where('city', 'LIKE', '%' . $request->city . '%');
        }


        $filter_max_price      = $request->input('max-price');
        $filter_min_price      = $request->input('min-price');
        
        if ($filter_max_price || $filter_min_price) {
            $creators->whereBetween('price', [$filter_min_price, $filter_max_price]);
        }


        if ($request->platform) {

            $platforms = $request->platform;
            $results = $creators->where(  function($query) use($platforms) {                    
                foreach ($platforms as $key => $platform) {
                    if($key > 0){
                        $query->orWhere($platform.'_connected', 1);
                    }else{
                        $query->where($platform.'_connected', 1);
                    }
                }            
            });
        }


        if ($request->followers && !$request->platform) {

            foreach ($request->followers as $key => $followers) {

                $results = $creators->where(  function($query) use($followers) {
                    switch ($followers) {
                        case '50k+':
                        $follower = 50000;
                        break;

                        case '20k+':
                        $follower = 20000;
                        break;

                        case '1k+':
                        $follower = 1000;
                        break;

                        case '10k+':
                        $follower = 10000;
                        break;


                        case '100k+':
                        $follower = 100000;
                        break;

                        case '500k+':
                        $follower = 500000;
                        break;

                        default:
                        $follower = 10;
                        break;
                    }
                    return $query->where('instagram_subscribers_or_followers', '>=', $follower)
                    ->orWhere('youtube_subscribers_or_followers', '>=', $follower)
                    ->orWhere('tiktok_subscribers_or_followers', '>=', $follower);
                });
            }
        }

        if ($request->followers && $request->platform) {

            $platforms = $request->platform;

            foreach ($request->followers as $key => $followers) {

                $results = $creators->where(  function($query) use($followers, $platforms) {
                    switch ($followers) {
                        case '50k+':
                        $follower = 50000;
                        break;

                        case '20k+':
                        $follower = 20000;
                        break;

                        case '1k+':
                        $follower = 1000;
                        break;

                        case '10k+':
                        $follower = 10000;
                        break;


                        case '100k+':
                        $follower = 100000;
                        break;

                        case '500k+':
                        $follower = 500000;
                        break;

                        default:
                        $follower = 10;
                        break;
                    }

                    foreach ($platforms as $key => $platform) {
                        if ($key > 0) {
                            $query->orWhere($platform.'_subscribers_or_followers', '>=', $follower);
                        }else{
                            $query->where($platform.'_subscribers_or_followers', '>=', $follower);
                        }
                    }
                });
            }
        }


        if ($request->rating) {
            $creators->whereIn('avg_rating', $request->input('rating'));
        }


        $searchString = $slug;                                

        $creators->whereHas('categoriesData', function ($query) use ($searchString){
            $query->where('slug', $searchString);
        });

        $filter_category = Category::where('slug', $slug)->orWhere('id', $slug)->value('id');
        $category_meta_title = Category::where('slug', $slug)->orWhere('id', $slug)->value('meta_title');
        $category_h1_title = Category::where('slug', $slug)->orWhere('id', $slug)->value('h1_title');
        if (!$category_h1_title && empty($category_h1_title)) {
            $category_h1_title = Category::where('slug', $slug)->orWhere('id', $slug)->value('name');
        }

        $category_h2_tag = Category::where('slug', $slug)->orWhere('id', $slug)->value('h2_tag');
        if (!$category_h2_tag && empty($category_h2_tag)) {
            $category_h2_tag = Category::where('slug', $slug)->orWhere('id', $slug)->value('name');
        }

        $category_meta_description = Category::where('slug', $slug)->orWhere('id', $slug)->value('meta_description');
        

        if ($request->gender) {
            $creators->whereIn('gender', $request->gender);
        }


        $creators = $creators->orderByRaw("FIELD(id, $ids_ordered)")->paginate(10);

        $cities = $creators->pluck('city')->toArray();

        $cities = array_values(array_filter($cities, fn($value) => !is_null($value) && $value !== ''));   


        foreach ($creators as $key => $creator) {
            $creators[$key]->favorite = 0;

            if ($creator->reviews && $creator->reviews->count()) {
                Creator::where('id', $creator->id)->update(['avg_rating' => round($creator->reviews->avg('rating'), 2)]);
            }

            $pricings = CreatorPricing::where('creator_id', $creator->id)->get();

            if ($pricings) {

                foreach ($pricings as $key1 => $pricing) {

                    if ($key1 == 0 && !empty($pricing->price)) {
                        Creator::where('id', $creator->id)->update(['price' => $pricing->price]);
                    }
                }
            }

            if (auth()->user() && auth()->user()->id) {
                $count = UserCreator::where('creator_id',$creator->id)->where('user_id',auth()->user()->id)->count();

                if ($count) {
                    $creators[$key]->favorite = 1;
                }
            }

            if (auth()->guard('creator')->user() && auth()->guard('creator')->user()->id) {
                $count = CreatorCreator::where('creator_id',$creator->id)->where('user_id',auth()->guard('creator')->user()->id)->count();

                if ($count) {
                    $creators[$key]->favorite = 1;
                }
            }
        }

        return view('creator.marketplace.creators', compact('creators', 'categories', 'states', 'countries', 'cities', 'filter_category', 'category_meta_title', 'category_meta_description', 'category_h1_title', 'category_h2_tag'));
    }
}
