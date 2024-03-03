<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creator;
use App\Models\Badge;
use App\Models\CreatorShowcaseWork;
use App\Models\CreatorClientLogo;

class MyServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function index()
    {
        $creator = Creator::find(auth()->user()->id);

        $service_completed = 'completed';

        if(empty($creator->talent_title)){
            $service_completed = 'not completed';
        }

        if(empty($creator->tags) || count($creator->tags) <= 0){
            $service_completed = 'not completed';
        }

        $showcase_work_count = CreatorShowcaseWork::where('creator_id', $creator->id)->count();

        if($showcase_work_count < 4){
            $service_completed = 'not completed';
        }

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

        $id = auth()->user()->id;
        $showcase_works = CreatorShowcaseWork::where('creator_id', $id)->get();
        $client_logos = CreatorClientLogo::where('creator_id', $id)->get();


        $badge_ids = Creator::where('id', auth()->guard('creator')->user()->id)->value('badge_ids');
        $badge_ids = json_decode($badge_ids);
        $badges = Badge::latest()->where(['user_type' => 'Creator', 'status' =>1])->get();

        return view('creator.myservices.my-services', compact('selected_content_types', 'selected_tags', 'selected_categories', 'showcase_works', 'client_logos', 'service_completed', 'badges', 'badge_ids'));
    }
}
