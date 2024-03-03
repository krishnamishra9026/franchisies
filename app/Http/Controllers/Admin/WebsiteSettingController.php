<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Storage;

class WebsiteSettingController extends Controller
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
    public function index()
    {
        $setting = WebsiteSetting::first();
        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
            'email'           => ['required'],
            'phone_number'   => ['required'],
        ]);

        $input = $request->except('_token');
        
        WebsiteSetting::create($input);

        return redirect()->route('admin.website-settings.index')->with('success', 'WebsiteSetting added successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$request->validate([
            'name'                  => ['required'],       
        ]);*/

        $input = $request->except('_token');


        $admin                      = WebsiteSetting::find($id);
        $admin->copyright_text          = $request->copyright_text;
        $admin->facebook_link          = $request->facebook_link;
        $admin->instagram_link          = $request->instagram_link;
        $admin->youtube_link          = $request->youtube_link;
        $admin->tiktok_link          = $request->tiktok_link;
        $admin->twitter_link          = $request->twitter_link;

        if($request->hasfile('logo')){

            if(isset($admin->logo)){

                $path   = 'public/uploads/logo/'.$admin->logo;

                Storage::delete($path);

            }

            $image      = $request->file('logo');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/logo/', $name, 'public');

            $admin->logo = $name;

        }

        $admin->save();

        return redirect()->route('admin.website-settings.index')->with('success', 'Website Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
