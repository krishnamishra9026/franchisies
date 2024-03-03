<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageService;
use App\Models\Category;
use Storage;
use Intervention\Image\Facades\Image;

class HomePageServiceController extends Controller
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
        $services = HomePageService::orderBy('id', 'desc')->paginate(15);
        return view('admin.settings.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);

        return view('admin.settings.services.create', compact('categories'));
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

        if($request->hasfile('image')){

            $image = $request->file('image');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/services');
            $img = Image::make($image->path());
            $img->resize(246, 330, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name); 

            $input['image'] = $image_name;

        }
        
        HomePageService::create($input);

        return redirect()->route('admin.services-setting.index')->with('success', 'Home Page Service added successfully');
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
        $service   = HomePageService::find($id);
        $categories = Category::get(['name', 'id']);
        return view('admin.settings.services.edit', compact('service', 'categories'));
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

        $homepageservice = HomePageService::find($id);

        if($request->hasfile('image')){

            if(isset($homepageservice->image)){

                $path   = 'public/uploads/image/'.$homepageservice->image;

                Storage::delete($path);
            }

            $image = $request->file('image');

            $image_name       = $image->getClientOriginalName();

            $destinationPath = storage_path('/app/public/uploads/services');
            $img = Image::make($image->path());
            $img->resize(246, 330, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name); 

            $input['image'] = $image_name;

        }
        
        HomePageService::find($id)->update($input);

        return redirect()->route('admin.services-setting.index')->with('success', 'Home Page Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        HomePageService::find($id)->delete();
        return redirect()->route('admin.services-setting.index')->with('success', 'Home Page Service deleted successfully');
    }
}
