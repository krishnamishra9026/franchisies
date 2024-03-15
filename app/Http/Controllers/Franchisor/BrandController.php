<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use DB;

class BrandController extends Controller
{

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
        $filter_phone             = $request->input('filter_phone');

        $brands = Brand::where('franchisor_id', auth()->user()->id)->orderBy('id', 'desc');

        if ($request->filter_name) {
            $brands->where('brandname', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if (isset($request->filter_status)) {
            $brands->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_email) {
            $brands->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }              

        $brands = $brands->paginate(15);    

        return view('franchisor.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);
        return view('franchisor.brands.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'                 => ['required'],
        ]);

        $input = $request->except('_token');

        $input['password'] = Hash::make(($input['password'] ?? 'password'));

        $input['franchisor_id'] = auth()->user()->id;

        $brandData = Brand::create($input);

        $brand = Brand::find($brandData->id);

        if($request->hasfile('logo')){

            $logo      = $request->file('logo');
            $name       = $logo->getClientOriginalName();
            $logo->storeAs('uploads/brands/'.$brand->id.'/logo/', $name, 'public');
            $brand->logo = $name;
        }

        if($request->hasfile('banner')){

            $banner      = $request->file('banner');
            $name       = $banner->getClientOriginalName();
            $banner->storeAs('uploads/brands/'.$brand->id.'/banner/', $name, 'public');
            $brand->banner = $name;
        }

        if($request->hasfile('tbanner')){

            $tbanner      = $request->file('tbanner');
            $name       = $tbanner->getClientOriginalName();
            $tbanner->storeAs('uploads/brands/'.$brand->id.'/tbanner/', $name, 'public');
            $brand->tbanner = $name;
        }

        if($request->hasfile('tbanner1')){

            $tbanner1      = $request->file('tbanner1');
            $name       = $tbanner1->getClientOriginalName();
            $tbanner1->storeAs('uploads/brands/'.$brand->id.'/tbanner1', $name, 'public');
            $brand->tbanner1 = $name;
        }

        if($request->hasfile('tbanner2')){

            $tbanner2      = $request->file('tbanner2');
            $name       = $tbanner2->getClientOriginalName();
            $tbanner2->storeAs('uploads/brands/'.$brand->id.'/tbanner2/', $name, 'public');
            $brand->tbanner2 = $name;
        }


        if($request->hasfile('tbanner3')){

            $tbanner3      = $request->file('tbanner3');
            $name       = $tbanner3->getClientOriginalName();
            $tbanner3->storeAs('uploads/brands/'.$brand->id.'/tbanner3/', $name, 'public');
            $brand->tbanner3 = $name;
        }

        if($request->hasfile('tbanner4')){

            $tbanner4      = $request->file('tbanner4');
            $name       = $tbanner4->getClientOriginalName();
            $tbanner4->storeAs('uploads/brands/'.$brand->id.'/tbanner4/', $name, 'public');
            $brand->tbanner4 = $name;
        }


        if($request->hasfile('tbanner5')){

            $tbanner5      = $request->file('tbanner5');
            $name       = $tbanner5->getClientOriginalName();
            $tbanner5->storeAs('uploads/brands/'.$brand->id.'/tbanner5', $name, 'public');
            $brand->tbanner5 = $name;
        }

        if($request->hasfile('ppt')){

            $ppt      = $request->file('ppt');
            $name       = $ppt->getClientOriginalName();
            $ppt->storeAs('uploads/brands/'.$brand->id.'/ppt', $name, 'public');
            $brand->ppt = $name;
        }

        $brand->save();

        $brand->save();


        return redirect()->route('franchisor.brands.index')->with('success', 'Brand added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand   = Brand::find($id);

        return view('franchisor.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand   = Brand::find($id);
        $categories = Category::get(['name', 'id']);

        return view('franchisor.brands.edit', compact('brand', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {              
        $request->validate([
            'email'                      => ['required'],
        ]);

        $input = $request->except('_token');

        $brand = Brand::find($id);

        
        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make(($input['password']));
        }else{
            $input['password'] = 'password';
        }

        $input['franchisor_id'] = auth()->user()->id;
        
        Brand::find($id)->update($input);              

        if($request->hasfile('logo')){

            $logo      = $request->file('logo');
            $name       = $logo->getClientOriginalName();
            $logo->storeAs('uploads/brands/'.$brand->id.'/logo/', $name, 'public');
            $brand->logo = $name;
        }

        if($request->hasfile('banner')){                  

            $banner      = $request->file('banner');
            $name       = $banner->getClientOriginalName();
            $banner->storeAs('uploads/brands/'.$brand->id.'/banner/', $name, 'public');
            $brand->banner = $name;
        }

        if($request->hasfile('tbanner')){

            $tbanner      = $request->file('tbanner');
            $name       = $tbanner->getClientOriginalName();
            $tbanner->storeAs('uploads/brands/'.$brand->id.'/tbanner/', $name, 'public');
            $brand->tbanner = $name;
        }

        if($request->hasfile('tbanner1')){

            $tbanner1      = $request->file('tbanner1');
            $name       = $tbanner1->getClientOriginalName();
            $tbanner1->storeAs('uploads/brands/'.$brand->id.'/tbanner1', $name, 'public');
            $brand->tbanner1 = $name;
        }

        if($request->hasfile('tbanner2')){

            $tbanner2      = $request->file('tbanner2');
            $name       = $tbanner2->getClientOriginalName();
            $tbanner2->storeAs('uploads/brands/'.$brand->id.'/tbanner2/', $name, 'public');
            $brand->tbanner2 = $name;
        }


        if($request->hasfile('tbanner3')){

            $tbanner3      = $request->file('tbanner3');
            $name       = $tbanner3->getClientOriginalName();
            $tbanner3->storeAs('uploads/brands/'.$brand->id.'/tbanner3/', $name, 'public');
            $brand->tbanner3 = $name;
        }

        if($request->hasfile('tbanner4')){

            $tbanner4      = $request->file('tbanner4');
            $name       = $tbanner4->getClientOriginalName();
            $tbanner4->storeAs('uploads/brands/'.$brand->id.'/tbanner4/', $name, 'public');
            $brand->tbanner4 = $name;
        }


        if($request->hasfile('tbanner5')){

            $tbanner5      = $request->file('tbanner5');
            $name       = $tbanner5->getClientOriginalName();
            $tbanner5->storeAs('uploads/brands/'.$brand->id.'/tbanner5', $name, 'public');
            $brand->tbanner5 = $name;
        }

        if($request->hasfile('ppt')){

            $ppt      = $request->file('ppt');
            $name       = $ppt->getClientOriginalName();
            $ppt->storeAs('uploads/brands/'.$brand->id.'/ppt', $name, 'public');
            $brand->ppt = $name;
        }

        $brand->save();

        return redirect()->route('franchisor.brands.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Brand::find($id)->delete();
        return redirect()->route('franchisor.brands.index')->with('success', 'Brand deleted successfully');
    }
}
