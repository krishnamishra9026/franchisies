<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function index()
    {

        $brands_count =  Brand::count();
        $category_count =  Category::count();
        $enquiry_count =  Enquiry::count();

        return view('admin.dashboard.dashboard', compact('brands_count', 'category_count', 'enquiry_count'));
    }
}
