<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchisor;
use Spatie\Permission\Models\Role;
use Hash;
use DB;

class UserManagementController extends Controller
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
    public function index()
    {
        $users = Franchisor::orderBy('id', 'desc')->paginate(15);
        $roles = Role::pluck('name','name')->all();
        return view('franchisor.users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('franchisor.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'            => ['required'],
            'email'           => ['required'],
        ]);

        $input = $request->except('_token');
        $input['password'] = Hash::make($request->input('password'));

        $user = Franchisor::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('franchisor.user-management.index')->with('success', 'User added successfully');
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
        $user   = Franchisor::find($id);
        $roles = Role::pluck('name','name')->all();
        if ($user->roles) {
        $userRole = $user->roles->pluck('name','name')->all();
    }else{
        $userRole = [];
    }
        return view('franchisor.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],   
            'roles'          => ['required'],         
        ]);

        $input = $request->except('_token');

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = Hash::make('password');
        }
        

        $user = Franchisor::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        return redirect()->route('franchisor.user-management.index')->with('success', 'User added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        Franchisor::find($id)->delete();
        return redirect()->route('franchisor.user-management.index')->with('success', 'User deleted successfully');
    }
}
