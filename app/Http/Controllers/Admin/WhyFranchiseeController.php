<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyFranchisee;

class WhyFranchiseeController extends Controller
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
        $why_franchisees = WhyFranchisee::orderBy('id', 'desc')->paginate(15);
        return view('admin.why-franchisees.index', compact('why_franchisees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.why-franchisees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => ['required'],
        ]);

        $input = $request->except('_token');
        
        WhyFranchisee::create($input);

        return redirect()->route('admin.why-franchisees.index')->with('success', 'WhyFranchisee added successfully');
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
        $why_franchisee   = WhyFranchisee::find($id);
        return view('admin.why-franchisees.edit', compact('why_franchisee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'                  => ['required'],       
        ]);

        $input = $request->except('_token');
        
        WhyFranchisee::find($id)->update($input);

        return redirect()->route('admin.why-franchisees.index')->with('success', 'WhyFranchisee added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        WhyFranchisee::find($id)->delete();
        return redirect()->route('admin.why-franchisees.index')->with('success', 'WhyFranchisee deleted successfully');
    }
}
