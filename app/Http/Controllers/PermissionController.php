<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view("backend.permission.permissions", compact(['permissions']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permession_name' => 'required',
            'is_active' => 'required',
        ]);

        $permission = new Permission();
        $permission->permession_name = $request->permession_name;
        $permission->is_active = $request->is_active;
        $permission->save();

        return redirect()->back()->with('success', 'Congratulations!! Permission Created Successfully!!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $permission = Permission::find($id);
        return view('backend.permission.edit', compact(['permission']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'permession_name' => 'required',
            'is_active' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        $permission = Permission::find($id);
        $permission->permession_name = $request->permession_name;
        $permission->is_active = $request->is_active;
        $permission->update();

        return redirect()->back()->with('success', 'Congratulations!! Permission Updated Successfully!!');
    }
}
