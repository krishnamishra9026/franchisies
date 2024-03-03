<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Creator;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Earning;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function index()
    {

        $creators_count =  Creator::count();
        $sponsor_count =  User::count();
        $campaign_count =  Campaign::count();
        $earning_count =  Earning::sum('amount');
        $enquiry_count =  Enquiry::count();

        $sponsors = User::orderBy('id', 'desc')->paginate(10);
        $creators = Creator::orderBy('id', 'desc')->paginate(10);
        $campaigns = Campaign::orderBy('id', 'desc')->paginate(10);

        return view('admin.dashboard.dashboard', compact('creators_count', 'sponsor_count', 'campaign_count', 'earning_count', 'enquiry_count', 'sponsors', 'creators', 'campaigns'));
    }
}
