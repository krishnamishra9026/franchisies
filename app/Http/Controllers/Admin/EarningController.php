<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Badge;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $packages = Badge::orderBy('id', 'desc')->get(['id', 'name']);

        $earnings = Earning::orderBy('id', 'desc');

        $filter_name            = $request->input('filter_name');
        $filter_badge           = $request->input('filter_badge');
        $filter_user_type       = $request->input('filter_user_type');
        $filter_date_from       = $request->input('filter_date_from');
        $filter_date_to         = $request->input('filter_date_to');


        if ($request->filter_name) {
            $earnings->where('username', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if ($request->filter_badge) {
            $earnings->where('badges', 'LIKE', '%"' . $request->input('filter_badge') . '"%');
        }

        if ($request->filter_user_type) {
            $earnings->where('user_type', $request->input('filter_user_type'));
        }

        if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $earnings->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $earnings->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $earnings->whereDate('created_at', '<=', $to);
        }

        $earnings = $earnings->paginate(15);
        return view('admin.earnings.index', compact('earnings', 'packages', 'filter_name', 'filter_badge', 'filter_user_type', 'filter_date_from', 'filter_date_to'));

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
