<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{

    function userAccess($id)
    {
        $user = User::findOrFail($id);

        $permissions = Permission::all();
        $roles = Role::all();

        $userRole = $user->roles->pluck('id')->toArray();
        $userPermission = $user->permissions->pluck('id')->toArray();

        return view('admin.access')
            ->with('user', $user)
            ->with('permissions', $permissions)
            ->with('roles', $roles)
            ->with('userRole', $userRole)
            ->with('userPermission', $userPermission);
    }


    function updateAccessUser($id, Request $request)
    {

        DB::table('permission_user')->where('user_id', $id)->delete();
        DB::table('role_user')->where('user_id', $id)->delete();

        $user = User::findOrFail($id);


        if ($request->has('permissions')) {
            $request->validate([
                'permissions' => 'array',
                'permissions.*' => 'exists:permissions,id'
            ]);
        }
        if ($request->has('roles')) {
            $request->validate([
                'roles' => 'array',
                'roles.*' => 'exists:roles,id'
            ]);
        }

        $permissions = $request->input('permissions', []);
        $roles = $request->input('roles', []);
        $user->permissions()->sync($permissions);
        $user->roles()->sync($roles);


        return redirect('zodiac')->with('success', 'Access Updated!');
    }
}
