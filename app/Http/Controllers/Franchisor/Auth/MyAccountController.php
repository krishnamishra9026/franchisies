<?php

namespace App\Http\Controllers\Franchisor\Auth;

use App\Models\Franchisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:franchisor');
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
     * @param  \App\Models\Franchisor  $franchisor
     * @return \Illuminate\Http\Response
     */
    public function show(Franchisor $franchisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Franchisor  $franchisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchisor $franchisor)
    {
        $id             = Auth::guard('franchisor')->id();
        $franchisor          = Franchisor::find($id);
        $franchisor->avatar  = isset($franchisor->avatar) ? asset('storage/uploads/franchisor/'.$franchisor->avatar) : URL::to('assets/images/users/avatar.png') ;
        return view('franchisor.settings.my-account', compact('franchisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Franchisor  $franchisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname'     =>  'required',
            'email'         =>  'required',
        ]);

        $franchisor                  = Franchisor::find($id);
        $franchisor->firstname       = $request->firstname;
        $franchisor->lastname        = $request->lastname;
        $franchisor->email           = $request->email;
        $franchisor->phone           = $request->phone;

        if($request->hasfile('avatar')){

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/franchisor/', $name, 'public');

            if(isset($franchisor->avatar)){

                $path   = 'public/uploads/franchisor/'.$franchisor->avatar;

                Storage::delete($path);

            }

            $franchisor->avatar = $name;

        }

        $franchisor->save();

        return redirect()->route('franchisor.my-account.edit', $franchisor->id)->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Franchisor  $franchisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Franchisor $franchisor)
    {
        //
    }
}
