<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
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
        $reviews = Review::orderBy('id', 'desc')->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        Review::create($input);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully');
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
        $review   = Review::find($id);
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'author'                  => ['required'],       
        ]);

        $input = $request->except('_token');
        
        Review::find($id)->update($input);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Review::find($id)->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }
}
