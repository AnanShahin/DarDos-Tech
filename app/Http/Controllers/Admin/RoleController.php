<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::whereNotIn('name', ['admin'])->get();

        return view('admin.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $this->validate($request, [
            'name' => 'required'
        ]);

        if (Role::create($validatedData)) {
            return to_route('roles.index')->with('success-status', 'Role Created Successfully.');
        }
        return to_route('roles.index')->with('failed-status', 'Something Wrong!');
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
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit')->with(compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $this->validate($request, [
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->update($validatedData);

        if ($role) {
            return to_route('roles.index')->with('success-status', 'Role Updated Successfully.');
        }
        return to_route('roles.index')->with('failed-status', 'Something Wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role = Role::findOrFail($id);

        if ($role->delete()) {
            return to_route('roles.index')->with('success-status', 'Role Deleted Successfully.');
        }
        return to_route('roles.index')->with('failed-status', 'Something Wrong!');
    }

    public function givePermission(Request $request, Role $role)
    {
        //
        if ($role->hasPermissionTo($request->permission)) {
            Return back()->with('failed-status', 'Permission Already Exists');
        }
        $role->givePermissionTo($request->permission);
        Return back()->with('success-status', 'Permission Added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        //
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            Return back()->with('success-status', 'Permission Revoked.');
        }
        Return back()->with('failed-status', 'Permission not exists.');
    }
}
