<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collab;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Tag;

class CollabController extends Controller
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
    public function index(Request $request)
    {
        $filter_status          = $request->input('filter_status');
        $filter_name            = $request->input('filter_name');
        $filter_email            = $request->input('filter_email');
        $filter_phone          = $request->input('filter_phone');
        $filter_date_from       = $request->input('filter_date_from');
        $filter_date_to         = $request->input('filter_date_to');

        $collabs = Collab::orderBy('id', 'desc');

         if ($request->filter_name) {
            $collabs->where('name', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if ($request->filter_mobile) {
            $collabs->where('phone', 'LIKE', '%' . $request->input('filter_phone') . '%')->groupBy('phone');
        }

        if ($request->filter_email) {
            $collabs->where('email', 'LIKE', '%' . $request->input('filter_email') . '%')->groupBy('email');
        }

         if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $collabs->whereBetween('date', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $collabs->whereDate('date', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $collabs->whereDate('date', '<=', $to);
        }    

        $collabs = Collab::orderBy('id', 'desc')->paginate(15);
        return view('admin.collabs.index', compact('collabs', 'filter_status', 'filter_name', 'filter_email', 'filter_phone', 'filter_date_from', 'filter_date_to'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $content_types = ContentType::pluck('name','id');
        $tags = Tag::pluck('name','id');
        return view('admin.collabs.create', compact('categories', 'content_types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        Collab::create($input);

        return redirect()->route('admin.collabs.index')->with('success', 'Collab added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collab   = Collab::with('Category', 'ContentType', 'Tag')->find($id);
        return view('admin.collabs.show', compact('collab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::pluck('name','id');
        $content_types = ContentType::pluck('name','id');
        $tags = Tag::pluck('name','id');

        $collab   = Collab::find($id);
        return view('admin.collabs.edit', compact('collab', 'categories', 'content_types', 'tags'));
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
        
        Collab::find($id)->update($input);

        return redirect()->route('admin.collabs.index')->with('success', 'Collab added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Collab::find($id)->delete();
        return redirect()->route('admin.collabs.index')->with('success', 'Collab deleted successfully');
    }
}
