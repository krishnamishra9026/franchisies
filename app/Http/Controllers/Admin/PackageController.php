<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
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
        $packages = Package::orderBy('id', 'desc')->paginate(15);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        Package::create($input);

        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully');
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
        $package   = Package::find($id);
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => ['required'],       
        ]);

        $input = $request->except('_token');
        
        Package::find($id)->update($input);

        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Package::find($id)->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully');
    }
}
