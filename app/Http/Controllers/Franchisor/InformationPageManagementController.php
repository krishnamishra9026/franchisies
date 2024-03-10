<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformationPageManagement;

class InformationPageManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:franchisor');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informations = InformationPageManagement::orderBy('id', 'desc')->paginate(15);
        return view('franchisor.informations.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('franchisor.informations.create');
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
        
        InformationPageManagement::create($input);

        return redirect()->route('franchisor.information-page-management.index')->with('success', 'InformationPageManagement added successfully');
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
        $information   = InformationPageManagement::find($id);
        return view('franchisor.informations.edit', compact('information'));
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
        
        InformationPageManagement::find($id)->update($input);

        return redirect()->route('franchisor.information-page-management.index')->with('success', 'InformationPageManagement added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        InformationPageManagement::find($id)->delete();
        return redirect()->route('franchisor.information-page-management.index')->with('success', 'InformationPageManagement deleted successfully');
    }
}
