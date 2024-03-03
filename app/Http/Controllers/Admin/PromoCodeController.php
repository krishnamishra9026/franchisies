<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoCodeController extends Controller
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
        $promo_codes = PromoCode::orderBy('id', 'desc')->paginate(15);
        return view('admin.promo-codes.index', compact('promo_codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promo-codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'            => ['required'],
        ]);

        $input = $request->except('_token');
        
        PromoCode::create($input);

        return redirect()->route('admin.promo-codes.index')->with('success', 'PromoCode added successfully');
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
        $promo_code   = PromoCode::find($id);
        return view('admin.promo-codes.edit', compact('promo_code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'                  => ['required'],       
        ]);

        $input = $request->except('_token');
        
        PromoCode::find($id)->update($input);

        return redirect()->route('admin.promo-codes.index')->with('success', 'Promo Code added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        PromoCode::find($id)->delete();
        return redirect()->route('admin.promo-codes.index')->with('success', 'Promo Code deleted successfully');
    }
}
