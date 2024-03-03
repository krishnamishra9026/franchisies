<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentType;

class ContentTypeController extends Controller
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
        $content_types = ContentType::orderBy('id', 'desc')->paginate(15);
        return view('admin.content_types.index', compact('content_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content_types.create');
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
        
        ContentType::create($input);

        return redirect()->route('admin.content-types.index')->with('success', 'ContentType added successfully');
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
        $content_type   = ContentType::find($id);
        return view('admin.content_types.edit', compact('content_type'));
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
        
        ContentType::find($id)->update($input);

        return redirect()->route('admin.content-types.index')->with('success', 'ContentType added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        ContentType::find($id)->delete();
        return redirect()->route('admin.content-types.index')->with('success', 'ContentType deleted successfully');
    }
}
