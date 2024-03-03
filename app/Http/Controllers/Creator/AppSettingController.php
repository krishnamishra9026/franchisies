<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AppSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Creator $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app_setting = AppSetting::where('creator_id',$id)->first();

        if (!$app_setting) {
           AppSetting::create(['creator_id' => $id]);
           $app_setting = AppSetting::where('creator_id',$id)->first();
        }

        return view('creator.settings.app-setting', compact('app_setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'instagram_username'   =>  'required',
            'youtube_api_key'      =>  'required',
            'tiktok_license_key'   =>  'required',
            'tiktok_username'   =>  'required',
        ]);

        $app_setting                       = AppSetting::find($id);
        $app_setting->instagram_username   = $request->instagram_username;
        $app_setting->youtube_api_key      = $request->youtube_api_key;
        $app_setting->tiktok_license_key   = $request->tiktok_license_key;
        $app_setting->tiktok_username   = $request->tiktok_username;

        $app_setting->save();

        return redirect()->route('creator.app-settings.edit', $id)->with('success', 'App Setting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $admin)
    {
        //
    }
}
