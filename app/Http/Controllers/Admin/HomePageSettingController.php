<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageSetting;
use Intervention\Image\Facades\Image;
use Storage;

class HomePageSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:administrator');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function basicSetting()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $setting = HomePageSetting::first();
        return view('admin.settings.basic', compact('setting'));
    }

    public function homeBanner()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $homebanner = HomePageSetting::first();
        return view('admin.settings.homebanner', compact('homebanner'));
    }

    public function homeBannerPost(Request $request)
    {

        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->banner_title                           = $request->banner_title;
        $admin->search_placeholder                     = $request->search_placeholder;
        $admin->search_button_background                 = $request->search_button_background;

        if($request->hasfile('background_image')){

            if(isset($admin->background_image)){

                $path   = 'public/uploads/homebanner/'.$admin->background_image;

                Storage::delete($path);

            }

            $image      = $request->file('background_image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/homebanner/', $name, 'public');

            $admin->background_image = $name;

        }

        if($request->hasfile('mobile_background_image')){

            if(isset($admin->mobile_background_image)){

                $path   = 'public/uploads/homebanner/'.$admin->mobile_background_image;

                Storage::delete($path);

            }

            $image      = $request->file('mobile_background_image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/homebanner/', $name, 'public');

            $admin->mobile_background_image = $name;

        }

        $admin->save();

        return redirect()->route('admin.settings.homebanner')->with('success', 'Setting updated successfully!');
    }

    public function saveBasicSetting(Request $request)
    {
        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->meta_title         = $request->meta_title;
        $admin->meta_description   = $request->meta_description;
        $admin->page_title         = $request->page_title;

        $admin->save();

        return redirect()->route('admin.settings.basic')->with('success', 'Setting updated successfully!');
    }


    public function saveSeoContentSetting(Request $request)
    {
        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->seo_content   = $request->seo_content;

        $admin->save();

        return redirect()->route('admin.settings.seo-content')->with('success', 'Setting updated successfully!');
    }


    public function worksSetting()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $setting = HomePageSetting::first();
        return view('admin.settings.works', compact('setting'));
    }

    public function saveWorksSetting(Request $request)
    {
        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->works_title1                = $request->works_title1;
        $admin->works_description1          = $request->works_description1;

        if($request->hasfile('works_image1')){

            if(isset($admin->works_image1)){

                $path   = 'public/uploads/works/'.$admin->works_image1;

                Storage::delete($path);

            }

            $image = $request->file('works_image1');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/works');
            $img = Image::make($image->path());
            $img->resize(312, 226, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);    


            $admin->works_image1 = $image_name;

        }

        $admin->works_title2                = $request->works_title2;
        $admin->works_description2          = $request->works_description2;

        if($request->hasfile('works_image2')){

            if(isset($admin->works_image2)){

                $path   = 'public/uploads/works/'.$admin->works_image2;

                Storage::delete($path);

            }

           $image = $request->file('works_image2');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/works');
            $img = Image::make($image->path());
            $img->resize(312, 226, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name); 

            $admin->works_image2 = $image_name;

        }

        $admin->works_title3                = $request->works_title3;
        $admin->works_description3          = $request->works_description3;

        if($request->hasfile('works_image3')){

            if(isset($admin->works_image3)){

                $path   = 'public/uploads/works/'.$admin->works_image3;

                Storage::delete($path);

            }

            $image = $request->file('works_image3');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/works');
            $img = Image::make($image->path());
            $img->resize(312, 226, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name); 

            $admin->works_image3 = $image_name;

        }

        $admin->works_title4                = $request->works_title4;
        $admin->works_description4          = $request->works_description4;

        if($request->hasfile('works_image4')){

            if(isset($admin->works_image4)){

                $path   = 'public/uploads/works/'.$admin->works_image4;

                Storage::delete($path);

            }

            $image = $request->file('works_image4');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/works');
            $img = Image::make($image->path());
            $img->resize(312, 226, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name); 

            $admin->works_image4 = $image_name;

        }


        $admin->save();

        return redirect()->route('admin.settings.works')->with('success', 'Setting updated successfully!');
    }



    public function bestForLessSetting()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $setting = HomePageSetting::first();
        return view('admin.settings.get-best-for-less', compact('setting'));
    }

    public function saveBestForLessSetting(Request $request)
    {
        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->title1                = $request->title1;
        $admin->description1          = $request->description1;

        if($request->hasfile('image')){

            if(isset($admin->image)){

                $path   = 'public/uploads/settings/best-for-less/'.$admin->image;

                Storage::delete($path);

            }

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/settings/best-for-less/', $name, 'public');

            $admin->image = $name;

        }

        $admin->title2                = $request->title2;
        $admin->description2          = $request->description2;

        $admin->title3                = $request->title3;
        $admin->description3          = $request->description3;

        $admin->title4                = $request->title4;
        $admin->description4          = $request->description4;


        $admin->save();

        return redirect()->route('admin.settings.get-best-for-less')->with('success', 'Setting updated successfully!');
    }


    public function banner1Setting()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $setting = HomePageSetting::first();
        return view('admin.settings.banner1', compact('setting'));
    }

    public function saveBanner1Setting(Request $request)
    {
        $input = $request->except('_token');

        $admin                            = HomePageSetting::first();
        $admin->banner1_title             = $request->banner1_title;
        $admin->banner1_button_text       = $request->banner1_button_text;
        $admin->banner1_button_bg_color   = $request->banner1_button_bg_color;
        $admin->banner1_button_text_color = $request->banner1_button_text_color;

        if($request->hasfile('banner1_image')){

            if(isset($admin->banner1_image)){

                $path   = 'public/uploads/settings/banner1/'.$admin->banner1_image;

                Storage::delete($path);
            }

            $banner1_image = $request->file('banner1_image');

            $name = $banner1_image->getClientOriginalName();

            $banner1_image->storeAs('uploads/settings/banner1/', $name, 'public');

            $admin->banner1_image = $name;

        }


        $admin->save();

        return redirect()->route('admin.settings.banner1')->with('success', 'Setting updated successfully!');
    }


    public function banner2Setting()
    {
        $setting = HomePageSetting::first();
        if (!$setting) {
            $setting = HomePageSetting::create(['meta_title' => '']);
        }
        $setting = HomePageSetting::first();
        return view('admin.settings.banner2', compact('setting'));
    }


    public function saveBanner2Setting(Request $request)
    {
        $input = $request->except('_token');

        $admin                     = HomePageSetting::first();
        $admin->banner2_title                           = $request->banner2_title;
        $admin->banner2_description                     = $request->banner2_description;
        $admin->banner2_button_text                     = $request->banner2_button_text;
        $admin->banner2_button_bg_color                 = $request->banner2_button_bg_color;
        $admin->banner2_button_text_color               = $request->banner2_button_text_color;

        if($request->hasfile('banner2_image')){

            if(isset($admin->banner2_image)){

                $path   = 'public/uploads/settings/banner2/'.$admin->banner2_image;

                Storage::delete($path);

            }

            $banner2_image      = $request->file('banner2_image');

            $name       = $banner2_image->getClientOriginalName();

            $banner2_image->storeAs('uploads/settings/banner2/', $name, 'public');

            $admin->banner2_image = $name;

        }


        $admin->save();

        return redirect()->route('admin.settings.banner2')->with('success', 'Setting updated successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function seoContentSetting($value='')
    {
        $seo_content = HomePageSetting::value('seo_content');
        return view('admin.settings.seo-content', compact('seo_content'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
