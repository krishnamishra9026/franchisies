<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Creator;
use App\Models\UserCreator;
use Storage;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Hash;

class SponsorController extends Controller
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
        $filter_status            = $request->input('filter_status');
        $filter_name              = $request->input('filter_name');
        $filter_email             = $request->input('filter_email');
        $filter_phone             = $request->input('filter_phone');
        $filter_date_from         = $request->input('filter_date_from');
        $filter_date_to           = $request->input('filter_date_to');

        $sponsors = User::orderBy('id', 'desc');

        if ($request->filter_name) {
            $sponsors->where('first_name', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('last_name', 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if ($request->filter_username) {
            $sponsors->where('username', 'LIKE', '%' . $request->input('filter_username') . '%');
        }

        if (isset($request->filter_status)) {
            $sponsors->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_mobile) {
            $sponsors->where('phone', 'LIKE', '%' . $request->input('filter_phone') . '%');
        }

        if ($request->filter_email) {
            $sponsors->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }

        if ($request->filter_date_from && $request->filter_date_to) {

            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $sponsors->whereBetween('created_at', [$from, $to]);
        }

        if ($request->filter_date_from) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date_from')));
            $sponsors->whereDate('created_at', '>=', $from);
        }

        if ($request->filter_date_to) {
            $to     = date('Y-m-d', strtotime($request->input('filter_date_to')));
            $sponsors->whereDate('created_at', '<=', $to);
        }

        $sponsors = $sponsors->paginate(15);
        return view('admin.sponsors.index', compact('sponsors', 'filter_status', 'filter_name', 'filter_email', 'filter_phone', 'filter_date_from', 'filter_date_to'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states             = State::get(['id', 'state']);
        $countries          = Country::get(['country']);
        $creators          = Creator::get(['firstname', 'lastname', 'id']);

        return view('admin.sponsors.create', compact('states', 'countries', 'creators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'            => ['required'],
            'username'              => ['required', 'string', 'max:255', 'unique:users'],
            'email'                 => ['required'],
            'city'                  => ['required'],
            'country'               => ['required'],
            'status'                => ['required'],
            'avatar'                => ['required'],
        ]);

        $input = $request->except('_token');

        if($request->hasfile('avatar')){

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/sponsors/', $name, 'public');

            $input['avatar'] = $name;

        }

        $input['name'] = $input['first_name'].' '.$input['last_name'] ?? '';
        $input['password'] = Hash::make($input['password'] ?? 'password');

        $user = User::create($input);

        if($request->creators && count($request->creators)){
            foreach ($request->creators as $key => $creator) {
                UserCreator::create(['user_id' => $user->id, 'creator_id' => $creator]);
            }
        }

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor   = User::with('campaigns')->find($id);
        return view('admin.sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $states             = State::get(['id', 'state']);
        $countries          = Country::get(['country']);
        
        $creators          = Creator::get(['firstname', 'lastname', 'id']);
        $sponsor   = User::find($id);

        $selected_creators = [];

        if($sponsor->creators && count($sponsor->creators)){

            foreach ($sponsor->creators as $key => $creator) {
                array_push($selected_creators, $creator->creator_id);
            }
        }

        return view('admin.sponsors.edit', compact('creators', 'sponsor', 'states', 'countries', 'selected_creators'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'            => ['required'],
            'username'              => ['required'],
            'email'                 => ['required'],
            'city'                  => ['required'],
            'country'               => ['required'],
            'status'                => ['required'],
        ]);

        $input = $request->except('_token');

        $sponsor = User::find($id);

        if($request->hasfile('avatar')){

            if(isset($sponsor->avatar)){
                $path   = 'public/uploads/sponsors/'.$sponsor->avatar;
                Storage::delete($path);
            }

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/sponsors/', $name, 'public');

            $input['avatar'] = $name;
        }

        $input['name'] = $input['first_name'].' '.$input['last_name'] ?? '';
        
        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $sponsor->password;
        }

        User::find($id)->update($input);

        UserCreator::where('user_id', $id)->delete();

        if($request->creators && count($request->creators)){
            foreach ($request->creators as $key => $creator) {
                UserCreator::create(['user_id' => $id, 'creator_id' => $creator]);
            }
        }

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor deleted successfully');
    }
}
