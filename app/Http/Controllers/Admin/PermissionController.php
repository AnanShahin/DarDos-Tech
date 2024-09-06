<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::all();

        return view('admin.permissions.index')->with(compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.permissions.create');
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

        if (Permission::create($validatedData)) {
            return to_route('permissions.index')->with('success-status', 'Permission Created Successfully.');
        }
        return to_route('permissions.index')->with('failed-status', 'Something Wrong!');
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
        $permission = Permission::findOrFail($id);
        $roles = Role::all();

        return view('admin.permissions.edit')->with(compact('permission', 'roles'));
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

        $permission = Permission::findOrFail($id);
        $permission->update($validatedData);

        if ($permission) {
            return to_route('permissions.index')->with('success-status', 'Permission Updated Successfully.');
        }
        return to_route('permissions.index')->with('failed-status', 'Something Wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Permission::findOrFail($id);

        if ($permission->delete()) {
            return to_route('permissions.index')->with('success-status', 'Permission Deleted Successfully.');
        }
        return to_route('permissions.index')->with('failed-status', 'Something Wrong!');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('failed-status', 'Role Exists.');
        }
        $permission->assignRole($request->role);
        return back()->with('success-status', 'Role Assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('success-status', 'Role Removed.');
        }

        return back()->with('failed-status', 'Role not exists.');
    }
}
