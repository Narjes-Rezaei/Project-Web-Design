<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Admin\Permission;

class PermissionController extends Controller
{
    function showPermission(){
        $permissions = Permission::all();

        return view('admin/permission/show-permission')->with('permissions', $permissions);

    }
    function addPermission(){

        return view('admin/permission/add-permission');

    }
    function storePermission(StorePermissionRequest $request){

        $request->validated();

        $permission = new Permission();

        $permission->name = $request->name;

        $permission->save();

        return redirect()->route('show-permission')->with('success' , 'Permission Added');


    }
    function editPermission($id){
        $permission = Permission::find($id);

        return view('admin/permission/edit-permission')->with('permission' , $permission);
    }
    function updatePermission(UpdatePermissionRequest $request , $id){

        $request->validated();

        $permission = Permission::find($id);

        $permission->name = $request->name;

        $permission->update();

        return redirect()->route('show-permission')->with('success' , 'Permission Updated');

    }
    function removePermission($id){
        $permission = Permission::find($id);

        $permission->delete();

        return response()->json([
            'success' => true,
            'message' => 'Permission Removed',
        ], 201);
    }
}
