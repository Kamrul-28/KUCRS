<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::join('permissions', 'permissions.id', '=', 'roles.permission_id')->get();
        return view("backend.role.roles", compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('is_active', 1)->get();
        return view('backend.role.create', compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
            'premession_id' => 'required',
            'is_active' => 'required',
        ]);

        $role = new role();
        $role->role_name = $request->role_name;
        $role->premession_id = $request->premession_id;
        $role->is_active = $request->is_active;
        $role->save();

        return redirect()->back()->with('success', 'Congratulations!! Role Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $role = Role::join('permissions', 'permissions.id', '=', 'roles.permission_id')->first();
        return view('backend.role.edit', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required',
            'premession_id' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $role = Role::find($id);
        $role->role_name = $request->role_name;
        $role->premession_id = $request->premession_id;
        $role->is_active = $request->is_active;
        $role->update();

        return redirect()->back()->with('success', 'Congratulations!! Role Updated Successfully!!');
    }
}
