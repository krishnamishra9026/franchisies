<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchisor;
use Hash;
use DB;

class FranchisorController extends Controller
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
        $franchisors = Franchisor::orderBy('id', 'desc')->paginate(15);
        return view('admin.franchisors.index', compact('franchisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.franchisors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'            => ['required'],
            'email'           => ['required'],
        ]);

        $input = $request->except('_token');
        $input['password'] = Hash::make($request->input('password'));

        $franchisor = Franchisor::create($input);

        return redirect()->route('admin.franchisors.index')->with('success', 'User added successfully');
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
        $franchisor   = Franchisor::find($id);
        return view('admin.franchisors.edit', compact('franchisor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname'                  => ['required'],
            'email'                 => ['required'],   
        ]);

        $input = $request->except('_token');

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = Hash::make('password');
        }
        

        $franchisor = Franchisor::find($id);
        $franchisor->update($input);

        return redirect()->route('admin.franchisors.index')->with('success', 'User added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Franchisor::find($id)->delete();
        return redirect()->route('admin.franchisors.index')->with('success', 'User deleted successfully');
    }
}
