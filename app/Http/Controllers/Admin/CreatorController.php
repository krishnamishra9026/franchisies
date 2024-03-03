<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creator;
use App\Models\Country;
use App\Models\State;
use App\Models\CreatorPricing;
use App\Models\CreatorClientLogo;
use App\Models\CreatorShowcaseWork;
use App\Models\Category;
use App\Models\CreatorContentType;
use App\Models\CreatorCategory;
use App\Models\CreatorTag;
use App\Models\ContentType;
use App\Models\Tag;
use Storage;
use Illuminate\Support\Facades\Hash;

class CreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter_status            = $request->input('filter_status');
        $filter_name              = $request->input('filter_name');
        $filter_email             = $request->input('filter_email');
        $filter_phone             = $request->input('filter_phone');
        $filter_date_from         = $request->input('filter_date_from');
        $filter_date_to           = $request->input('filter_date_to');

        $creators = Creator::orderBy('id', 'desc');

        if ($request->filter_name) {
            $creators->where('firstname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('lastname', 'LIKE', '%' . $request->input('filter_name') . '%');
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

        if ($request->filter_email) {
            $creators->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
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
        return view('admin.creators.index', compact('creators', 'filter_status', 'filter_name', 'filter_email', 'filter_phone', 'filter_date_from', 'filter_date_to'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get(['id', 'state']);
        $countries = Country::get(['country']);
        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);

        return view('admin.creators.create', compact('countries', 'states', 'tags', 'content_types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'             => ['required'],
            'email'                 => ['required'],
            // 'username'              => ['required', 'string', 'max:255', 'unique:creators'],
            'phone'                 => ['required'],
        ]);

        $input = $request->except('_token');

        if($request->hasfile('avatar')){

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/creators/', $name, 'public');

            $input['avatar'] = $name;

        }

        if($request->hasfile('showcase_example')){

            $image      = $request->file('showcase_example');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/creators/service/showcase/example/', $name, 'public');

            $input['showcase_example'] = $name;

        }


        $input['uid'] = md5(rand(1, 10) . microtime());
        $input['password'] = Hash::make(($input['password'] ?? 'password'));

        $creator = Creator::create($input);

        if($request->content_type && count($request->content_type)){
            foreach ($request->content_type as $key => $content_type) {
                CreatorContentType::create(['content_type_id' => $content_type, 'creator_id' => $creator->id]);
            }
        }

        if($request->category && count($request->category)){
            foreach ($request->category as $key => $category) {
                CreatorCategory::create(['category_id' => $category, 'creator_id' => $creator->id]);
            }
        }

        if($request->tag && count($request->tag)){
            foreach ($request->tag as $key => $tag) {
                CreatorTag::create(['tag_id' => $tag, 'creator_id' => $creator->id]);
            }
        }

        $phyllo_user_id = $this->createPhylloUser($creator->firstname.' '.$creator->lastname, $creator->uid);

        $phyllo_token = $this->createPhylloToken($phyllo_user_id);

        Creator::where('id', $creator->id)->update(['phyllo_user_id' => $phyllo_user_id, 'phyllo_token' => $phyllo_token]);

        if($request->addMorePricing){

            foreach ($request->addMorePricing as $key => $pricing) {

                if ($key == 0 && !empty($pricing['price'])) {
                    Creator::where('id', $creator->id)->update(['price' => $pricing['price']]);
                }

                CreatorPricing::create([
                    'creator_id' => $creator->id,
                    'service_detail' => $pricing['service_detail'],
                    'delivery_time' => $pricing['delivery_time'],
                    'social_platform' => json_encode($pricing['social_platform'] ?? []),
                    'price' => $pricing['price'],
                ]);

            }
        }

        if($request->addMoreInputFields){

            foreach ($request->addMoreInputFields as $key => $work) {

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

        if($request->addMoreBrands){
            foreach ($request->addMoreBrands as $key => $logo) {


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

        return redirect()->route('admin.creators.index')->with('success', 'Creator added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $creator   = Creator::find($id);

        $phyllo_user_id = $creator->phyllo_user_id;

        if($phyllo_user_id){

            //tiktok

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=de55aeec-0dc8-4119-bf90-16b3d1f0c987'); 

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);

            if (count($data['data'])) {

                $tiktok_followers_count = $data['data'][0]['reputation']['follower_count'];

                Creator::where('id', $id)->update(['tiktok_subscribers_or_followers' => $tiktok_followers_count, 'tiktok_connected' => 1]);
            }

            $ch = curl_init();

            //youtube

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=14d9ddf5-51c6-415e-bde6-f8ed36ad7054'); 

            // curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id=3930f0af-a161-4550-99a1-ee821dd71239&work_platform_id=14d9ddf5-51c6-415e-bde6-f8ed36ad7054'); 

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);

            if (count($data['data'])) {
                $youtube_followers_count = $data['data'][0]['reputation']['subscriber_count'];

                Creator::where('id', $id)->update(['youtube_subscribers_or_followers' => $youtube_followers_count, 'youtube_connected' => 1]);
            }          


            // instagram
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=9bb8913b-ddd9-430b-a66a-d74d846e6c66');
            // curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id=3637fa8a-9520-44bb-91ef-cfd7632639e8&work_platform_id=9bb8913b-ddd9-430b-a66a-d74d846e6c66');

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);

            if (count($data['data'])) {

                $instagram_followers_count = $data['data'][0]['reputation']['follower_count'];

                Creator::where('id', $id)->update(['instagram_subscribers_or_followers' => $instagram_followers_count, 'instagram_connected' => 1]);
            }
        }


        // $creator   = Creator::with('services')->find($id);
        return view('admin.creators.show', compact('creator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states             = State::get(['id', 'state']);
        $countries          = Country::get(['country']);
        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);
        $pricings = CreatorPricing::where('creator_id', $id)->get();
        $showcase_works = CreatorShowcaseWork::where('creator_id', $id)->get();
        $client_logos = CreatorClientLogo::where('creator_id', $id)->get();

        $creator   = Creator::find($id);

        $selected_content_types = [];

        if($creator->content_types && count($creator->content_types)){
            foreach ($creator->content_types as $key => $content_type) {
                array_push($selected_content_types, $content_type->content_type_id);
            }
        }


        $selected_tags = [];

        if($creator->tags && count($creator->tags)){
            foreach ($creator->tags as $key => $content_type) {
                array_push($selected_tags, $content_type->tag_id);
            }
        }

        $selected_categories = [];

        if($creator->categories && count($creator->categories)){
            foreach ($creator->categories as $key => $content_type) {
                array_push($selected_categories, $content_type->category_id);
            }
        }

        return view('admin.creators.edit', compact('creator', 'states', 'countries', 'pricings', 'showcase_works', 'client_logos', 'tags', 'content_types', 'categories', 'selected_content_types', 'selected_tags', 'selected_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname'                  => ['required'],
            'email'                      => ['required'],
            'phone'                      => ['required'],
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


        if($request->hasfile('showcase_example')){

            $image      = $request->file('showcase_example');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/creators/service/showcase/example/', $name, 'public');

            $input['showcase_example'] = $name;

        }

        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make(($input['password']));
        }else{
            $input['password'] = $creator->password;
        }
        
        Creator::find($id)->update($input);


        CreatorPricing::where('creator_id', $id)->delete();

        if ($request->addMorePricing) {

            foreach ($request->addMorePricing as $key => $pricing) {

                if ($key == 0 && !empty($pricing['price'])) {
                    Creator::where('id', $creator->id)->update(['price' => $pricing['price']]);
                }

                CreatorPricing::create([
                    'creator_id' => $id,
                    'service_detail' => $pricing['service_detail'],
                    'delivery_time' => $pricing['delivery_time'],
                    'social_platform' => json_encode($pricing['social_platform'] ?? []),
                    'price' => $pricing['price'],
                ]);

            }
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

        return redirect()->route('admin.creators.index')->with('success', 'Creator added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Creator::find($id)->delete();
        return redirect()->route('admin.creators.index')->with('success', 'Creator deleted successfully');
    }


    public function createPhylloUser($name, $uid)
    {
        $post_data = [ 'name' => $name, 'external_id' => $uid];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/users');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

        $headers = array();
        $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);              

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($result, true);

        return $data['id'];       
    }


    public function createPhylloToken($uid)
    {
        $ch = curl_init();

        $data_post = ['user_id' => $uid, 'products' => ['IDENTITY', 'IDENTITY.AUDIENCE', 'ENGAGEMENT', 'ENGAGEMENT.AUDIENCE', 'INCOME', 'ACTIVITY']];

        curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/sdk-tokens');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_post));

        $headers = array();
        $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($result, true);

        return $data['sdk_token'];       
    }
}
