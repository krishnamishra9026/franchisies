<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use App\Models\UserCreator;
use Illuminate\Http\Request;

class ProfileShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $profile =  Creator::where('id', $id)->first();
        
        $profile->favorite = 0;
        if (auth()->user() && auth()->user()->id) {
            $count = UserCreator::where('creator_id',$profile->id)->where('user_id',auth()->user()->id)->count();

            if ($count) {
                $profile->favorite = 1;
            }
        }

        
        return view('frontend.profileshow',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
