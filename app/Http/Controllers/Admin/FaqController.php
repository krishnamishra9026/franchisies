<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
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
        $faqs = Faq::orderBy('id', 'desc')->paginate(15);
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'            => ['required'],
            'description'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        Faq::create($input);

        return redirect()->route('admin.faqs.index')->with('success', 'Faq added successfully');
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
        $faq   = Faq::find($id);
        return view('admin.faqs.edit', compact('faq'));
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
        
        Faq::find($id)->update($input);

        return redirect()->route('admin.faqs.index')->with('success', 'Faq added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Faq::find($id)->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'Faq deleted successfully');
    }
}
