<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages =  Creator::where('id', auth()->guard('creator')->id())->first();
        return view('creator.packages.packages',compact('packages'));
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
