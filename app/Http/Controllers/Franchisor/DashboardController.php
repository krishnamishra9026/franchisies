<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:franchisor');
    }

    public function index()
    {

        $brands_count =  Brand::count();
        $category_count =  Category::count();
        $enquiry_count =  Enquiry::count();

        return view('franchisor.dashboard.dashboard', compact('brands_count', 'category_count', 'enquiry_count'));
    }
}
