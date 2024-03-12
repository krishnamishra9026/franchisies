<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteContactSetting;
use Storage;

class WebsiteContactSettingController extends Controller
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
        $setting = WebsiteContactSetting::first();
        if (!$setting) {
            $setting = WebsiteContactSetting::create(['description' => '']);
        }
        $setting = WebsiteContactSetting::first();
        return view('admin.content_management.contact', compact('setting'));
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
            'header'            => ['required'],
            'email'           => ['required'],
            'phone'   => ['required'],
        ]);

        $input = $request->except('_token');
        
        WebsiteContactSetting::create($input);

        return redirect()->route('admin.contact-setting.index')->with('success', 'WebsiteContactSetting added successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'header'                  => ['required'],       
        ]);

        $admin                      = WebsiteContactSetting::first();

        if (!$admin) {
            WebsiteContactSetting::create(['description' => '']);
        }

        $admin                      = WebsiteContactSetting::first();
              
        $admin->header          = $request->header;
        $admin->description          = $request->description;
        $admin->email          = $request->email;
        $admin->phone          = $request->phone;

        if($request->hasfile('banner')){

            if(isset($admin->banner)){

                $path   = 'public/uploads/banner/'.$admin->banner;

                Storage::delete($path);

            }

            $image      = $request->file('banner');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/banner/', $name, 'public');

            $admin->banner = $name;

        }

        if($request->hasfile('image')){

            if(isset($admin->image)){

                $path   = 'public/uploads/image/'.$admin->image;

                Storage::delete($path);

            }

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/image/', $name, 'public');

            $admin->image = $name;

        }

        $admin->save();

        return redirect()->route('admin.contact-setting.index')->with('success', 'Website Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
