<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug, Request $request)
    {      
        $category_id = Category::where('slug', $slug)->value('id');
        $category = Category::where('slug', $slug)->value('name');
        $categories = Category::get(['name', 'slug']);

        $brandsData = Brand::where('category', $category_id)->latest();

        if($slug == 'all'){
             $brandsData = Brand::latest();
        }

        if($request->search){
            $brandsData->where('brandname', 'LIKE', '%'. $request->search. '%');
        }

        $brands = $brandsData->paginate(15);

        return view('frontend.brands', compact('category_id', 'brands', 'categories', 'slug', 'category'));
    }


    public function categorySearch(Request $request)
    {              
        $category = Category::where('slug', 'like', '%'. $request->search .'%')->orWhere('name', 'like', '%'. $request->search .'%')->value('slug');             
        if (isset($category) && !empty($category)) {
            return redirect()->route('categories.index', $category);
        }
        $category = Category::where('slug', $slug)->value('name');
        $categories = Category::get(['name', 'slug']);
        $brands = Brand::where('category', $category_id)->latest()->paginate(15);

        return view('frontend.brands', compact('category_id', 'brands', 'categories', 'slug', 'category'));
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
