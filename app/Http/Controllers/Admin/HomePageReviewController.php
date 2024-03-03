<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageReview;
use Storage;

class HomePageReviewController extends Controller
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
        $reviews = HomePageReview::orderBy('id', 'desc')->paginate(15);
        return view('admin.settings.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author_name'            => ['required'],
        ]);

        $input = $request->except('_token');

        if($request->hasfile('image')){

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/settings/reviews/', $name, 'public');

            $input['image'] = $name;
        }
        
        HomePageReview::create($input);

        return redirect()->route('admin.reviews-setting.index')->with('success', 'Home Page Review added successfully');
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
        $review   = HomePageReview::find($id);
        return view('admin.settings.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'author_name'                  => ['required'],       
        ]);

        $input = $request->except('_token');

        $homepagereview = HomePageReview::find($id);

        if($request->hasfile('image')){

            if(isset($homepagereview->image)){

                $path   = 'public/uploads/settings/reviews/'.$homepagereview->image;

                Storage::delete($path);
            }

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/settings/reviews/', $name, 'public');

            $input['image'] = $name;
        }
        
        HomePageReview::find($id)->update($input);

        return redirect()->route('admin.reviews-setting.index')->with('success', 'Home Page Review added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        HomePageReview::find($id)->delete();
        return redirect()->route('admin.reviews-setting.index')->with('success', 'Home Page Review deleted successfully');
    }
}
