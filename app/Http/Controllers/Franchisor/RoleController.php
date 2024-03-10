<?php

namespace App\Http\Controllers\Franchisor;

use App\Http\Controllers\Controller;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
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
        $filter_name    = $request->filter_name;
        $filter_status   = $request->filter_status;

        $roles = Role::orderBy('id', 'desc');

        if(isset($filter_name)){
            $roles =  $roles->where('name', 'LIKE', "%".$filter_name."%");
        }

        if(isset($filter_status)){
            $roles =  $roles->where('status',$filter_status);
        }

        $roles = $roles->paginate(20);

        return view('franchisor.roles.index', compact('roles', 'filter_name', 'filter_status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        return view('franchisor.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name'), 'status' => $request->status]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('franchisor.roles.index')->with('success', 'Role added successfully');
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
        $group = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('franchisor.roles.edit', compact('group','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        // $role->status = $request->status;
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('franchisor.roles.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();
        return redirect()->route('franchisor.roles.index')->with('success', 'Role deleted successfully');
    }
}
