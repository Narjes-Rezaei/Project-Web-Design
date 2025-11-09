<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function showRole()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('admin/role/show-role')->with('roles', $roles);
    }
    function addRole()
    {

        $permissions =  Permission::orderBy('created_at', 'desc')->get();

        return view('admin/role/add-role')->with('permissions', $permissions);
    }
    function storeRole(StoreRoleRequest $request)
    {

        $request->validated();

        $role = new Role();

        $role->name = $request->name;

        $role->save();
        $role->permissions()->sync($request->permissions);

        return redirect()->route('show-role')->with('success', 'Role Added');
    }
    function editRole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.role.edit-role', compact('role', 'permissions', 'rolePermissions'));
    }
    function updateRole(UpdateRoleRequest $request, $id)
    {

        DB::table('role_permission')->where('role_id', $id)->delete();

        $role = Role::findOrFail($id);

        $request->validated();

        $role->name = $request->name;
        $role->save();

        $permissions = $request->input('permissions', []);
        $role->permissions()->sync($permissions);

        return redirect('show-role')->with('success', 'Role Updated!');
    }
    function removeRole($id)
    {
        $role = Role::find($id);

        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role Removed',
        ], 201);
    }
}
