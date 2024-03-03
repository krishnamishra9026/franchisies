<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'desc')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
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

        if($request->hasfile('image')){

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/categories/', $name, 'public');

            $input['image'] = $name;

        }
        
        Category::create($input);

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
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
        $category   = Category::find($id);
        return view('admin.categories.edit', compact('category'));
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


        $category = Category::find($id);

        if($request->hasfile('image')){

            if(isset($category->image)){
                $path   = 'public/uploads/categories/'.$category->image;
                Storage::delete($path);
            }

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/categories/', $name, 'public');

            $input['image'] = $name;
        }

        
        Category::find($id)->update($input);

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
