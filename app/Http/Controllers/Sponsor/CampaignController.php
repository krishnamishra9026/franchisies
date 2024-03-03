<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Campaign;
use App\Models\CampaignContentType;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sponsors = User::get(['first_name', 'last_name', 'id']);
        $categories = Category::get(['name', 'id']);

        $campaigns = Campaign::where('sponsor', auth()->user()->id)->orderBy('id', 'desc');

        $filter_status       = $request->input('filter_status');
        $filter_title        = $request->input('filter_title');
        $filter_sponsor      = $request->input('filter_sponsor');
        $filter_category     = $request->input('filter_category');
        $filter_date_from    = $request->input('filter_date_from');
        $filter_date_to      = $request->input('filter_date_to');


        if ($request->filter_title) {
            $campaigns->where('first_name', 'LIKE', '%' . $request->input('filter_title') . '%')->orWhere('last_name', 'LIKE', '%' . $request->input('filter_title') . '%');
        }

        if ($request->filter_sponsor) {
            $campaigns->where('sponsor', $request->input('filter_sponsor'));
        }

        if (isset($request->filter_status)) {
            $campaigns->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_category) {
            $campaigns->where('category', $request->input('filter_category'));
        }

        if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $campaigns->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $campaigns->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $campaigns->whereDate('created_at', '<=', $to);
        }

        $campaigns = $campaigns->paginate(15);

        $active_campaigns = Campaign::where('sponsor', auth()->user()->id)->where('status', 1)->orderBy('id', 'desc')->paginate(15);

        $inactive_campaigns = Campaign::where('sponsor', auth()->user()->id)->where('status', 0)->orderBy('id', 'desc')->paginate(15);

        return view('sponsor.campaigns.index', compact('campaigns', 'sponsors', 'categories', 'filter_status', 'filter_title', 'filter_sponsor', 'filter_category', 'filter_date_from', 'filter_date_to', 'active_campaigns', 'inactive_campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sponsors = User::get(['first_name', 'last_name', 'id']);
        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);
        return view('sponsor.campaigns.create', compact('sponsors', 'categories', 'content_types'));
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

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/campaigns/', $name, 'public');

            $input['image'] = $name;
        }
        
        $campaign = Campaign::create($input);

        if($request->content_type && count($request->content_type)){
            foreach ($request->content_type as $key => $content_type) {
                CampaignContentType::create(['content_type_id' => $content_type, 'campaign_id' => $campaign->id]);
            }
        }

        return redirect()->route('campaigns.index')->with('success', 'Campaign added successfully');
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
        $campaign   = Campaign::find($id);
        $sponsors = User::get(['first_name', 'last_name', 'id']);
        $categories = Category::get(['name', 'id']);
        $content_types = ContentType::get(['name', 'id']);

        $selected_content_types = [];

        if($campaign->content_types && count($campaign->content_types)){
            foreach ($campaign->content_types as $key => $content_type) {
                array_push($selected_content_types, $content_type->content_type_id);
            }
        }

        return view('sponsor.campaigns.edit', compact('campaign', 'sponsors', 'categories', 'content_types', 'selected_content_types'));
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
        
        $campaign = Campaign::find($id)->update($input);

        if($request->hasfile('image')){

            if(isset($campaign->image)){
                $path   = 'public/uploads/campaigns/'.$campaign->image;
                Storage::delete($path);
            }

            $image      = $request->file('image');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/campaigns/', $name, 'public');

            $input['image'] = $name;
        }

        Campaign::find($id)->update($input);

        CampaignContentType::where(['campaign_id' => $id])->delete();
        if($request->content_type && count($request->content_type)){
            foreach ($request->content_type as $key => $content_type) {
                CampaignContentType::create(['content_type_id' => $content_type, 'campaign_id' => $id]);
            }
        }

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Campaign::find($id)->delete();
        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully');
    }
}
