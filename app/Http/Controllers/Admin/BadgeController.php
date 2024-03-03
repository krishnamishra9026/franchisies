<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\User;
use App\Models\Creator;
use Intervention\Image\Facades\Image;
use Storage;

class BadgeController extends Controller
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
        $badges = Badge::orderBy('id', 'desc')->paginate(15);
        return view('admin.badges.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.badges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
            'icon'            => ['required'],
        ]);

        $input = $request->except('_token');

        if($request->hasfile('icon')){


            $icon = $request->file('icon');

            $imagename       = 'original_'.$icon->getClientOriginalName();

            $icon->storeAs('uploads/badges/original/', $imagename, 'public');


            $icon_name       = $icon->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/badges');
            $img = Image::make($icon->path());
            $img->resize(26, 26, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$icon_name); 

            $input['icon'] = $icon_name;

        }
        
        Badge::create($input);

        return redirect()->route('admin.badges.index')->with('success', 'Badge added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $badge = Badge::find($id)->first();              

        if ($badge->user_type == 'Sponsor') {
            $users = User::where('badge_ids','LIKE',"%{$id}%")->get();

            foreach ($users as $key => $user) {
                $badge_ids = json_decode($user->badge_ids);
                      

                if (($key = array_search($id, $badge_ids)) !== false) {
                    unset($badge_ids[$key]);
                }

                User::where('id', $user->id)->update(['badge_ids' => json_encode(array_values($badge_ids))]);
            }

        }else{
            $users = Creator::where('badge_ids','LIKE',"%{$id}%")->get();

            foreach ($users as $key => $user) {
                $badge_ids = json_decode($user->badge_ids);

                if (($key = array_search($id, $badge_ids)) !== false) {
                    unset($badge_ids[$key]);
                }

                 Creator::where('id', $user->id)->update(['badge_ids' => json_encode($badge_ids)]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $badge   = Badge::find($id);
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => ['required'],     
            'icon'                  => ['required'],     
        ]);

        $input = $request->except('_token');


        $badge = Badge::find($id);

        if($request->hasfile('icon')){

            if(isset($badge->icon)){
                $path   = 'public/uploads/badges/'.$badge->icon;
                Storage::delete($path);
            }

            $icon = $request->file('icon');

            $imagename       = 'original_'.$icon->getClientOriginalName();

            $icon->storeAs('uploads/badges/original/', $imagename, 'public');

            $icon_name       = $icon->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/badges');
            $img = Image::make($icon->path());
            $img->resize(26, 26, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$icon_name); 

            $input['icon'] = $icon_name;

        }

        
        Badge::find($id)->update($input);

        return redirect()->route('admin.badges.index')->with('success', 'Badge added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $badge = Badge::find($id)->first();

        if ($badge->user_type == 'Sponsor') {
            $users = User::where('badge_ids','LIKE',"%{$id}%")->get();

            foreach ($users as $key => $user) {
                $badge_ids = json_decode($user->badge_ids);              

                if (($key = array_search($id, $badge_ids)) !== false) {
                    unset($badge_ids[$key]);
                }

                User::where('id', $user->id)->update(['badge_ids' => json_encode(array_values($badge_ids))]);
            }

        }else{
            $users = Creator::where('badge_ids','LIKE',"%{$id}%")->get();                  

            foreach ($users as $key => $user) {
                $badge_ids = json_decode($user->badge_ids);                      

                if (($key = array_search($id, $badge_ids)) !== false) {
                    unset($badge_ids[$key]);
                }

                 Creator::where('id', $user->id)->update(['badge_ids' => json_encode(array_values($badge_ids))]);
            }
        }

        Badge::find($id)->delete();
        return redirect()->route('admin.badges.index')->with('success', 'Badge deleted successfully');
    }
}
