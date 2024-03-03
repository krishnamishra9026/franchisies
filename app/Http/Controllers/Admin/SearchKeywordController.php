<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SearchKeyword;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Tag;

class SearchKeywordController extends Controller
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
        $search_keywords = SearchKeyword::orderBy('id', 'desc')->paginate(15);
        return view('admin.search_keywords.index', compact('search_keywords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);
        return view('admin.search_keywords.create', compact('categories', 'content_types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keyword'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        SearchKeyword::create($input);

        return redirect()->route('admin.search-keywords.index')->with('success', 'Search Keyword added successfully');
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
        $tag   = SearchKeyword::find($id);

        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);
        $tags = Tag::get(['name', 'id']);
        
        return view('admin.search_keywords.edit',  compact('categories', 'content_types', 'tags', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'keyword'                  => ['required'],       
        ]);

        $input = $request->except('_token');
        
        SearchKeyword::find($id)->update($input);

        return redirect()->route('admin.search-keywords.index')->with('success', 'Search Keyword added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        SearchKeyword::find($id)->delete();
        return redirect()->route('admin.search-keywords.index')->with('success', 'Search Keyword deleted successfully');
    }
}
