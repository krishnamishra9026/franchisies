<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
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
    public function index(Request $request)
    {
        $filter_status            = $request->input('filter_status');
        $filter_name              = $request->input('filter_name');
        $filter_email             = $request->input('filter_email');
        $filter_date_from         = $request->input('filter_date_from');
        $filter_date_to           = $request->input('filter_date_to');

        $enquiries = Enquiry::orderBy('id', 'desc');

        if ($request->filter_name) {
            $enquiries->where('first_name', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('last_name', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if (isset($request->filter_status)) {
            $enquiries->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_email) {
            $enquiries->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }

        if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $enquiries->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $enquiries->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $enquiries->whereDate('created_at', '<=', $to);
        }

        $enquiries = $enquiries->paginate(15);

        return view('franchisor.enquiries.index', compact('enquiries', 'filter_status', 'filter_name', 'filter_email', 'filter_date_from', 'filter_date_to'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('franchisor.enquiries.create');
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
        
        Enquiry::create($input);

        return redirect()->route('franchisor.enquiries.index')->with('success', 'Enquiry added successfully');
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
        $enquiry   = Enquiry::find($id);
        return view('franchisor.enquiries.edit', compact('enquiry'));
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
        
        Enquiry::find($id)->update($input);

        return redirect()->route('franchisor.enquiries.index')->with('success', 'Enquiry added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Enquiry::find($id)->delete();
        return redirect()->route('franchisor.enquiries.index')->with('success', 'Enquiry deleted successfully');
    }
}
