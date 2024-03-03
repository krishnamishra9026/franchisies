<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreatorDashboardSetting;
use Storage;

class CreatorDashboardSettingController extends Controller
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
        $admin                      = CreatorDashboardSetting::first();
        if (!$admin) {
            CreatorDashboardSetting::insert(['title' => '']);
        }
        $admin                      = CreatorDashboardSetting::first();
        
        return view('admin.content_management.creator-dashboard', compact('admin'));
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
        
        CreatorDashboardSetting::create($input);

        return redirect()->route('admin.creator-dashboard.index')->with('success', 'Creator Dashboard Setting added successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'header'                        => ['required'],       
            'title'                         => ['required'],       
            'description'                   => ['required'],       
        ]);

        $admin                      = CreatorDashboardSetting::find($id);
        if (!$admin) {
            CreatorDashboardSetting::insert(['title' => '']);
        }
        $admin                      = CreatorDashboardSetting::find($id);
        $admin->header          = $request->header;
        $admin->title          = $request->title;
        $admin->description          = $request->description;

        $admin->save();

        return redirect()->route('admin.creator-dashboard.index')->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
