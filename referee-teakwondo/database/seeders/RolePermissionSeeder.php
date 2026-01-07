<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all(); // all permissions
        $roles = Role::all(); // all roles

        // category for permissions

        $shows = [];
        $edits = [];
        $deletes = [];
        $addes = [];
        $updates = [];
        $stores = [];



        foreach($permissions as $permission){
            $parts = explode('-', $permission->name);

            if($parts[0] === 'show'){
                $shows[] = $permission->id;
            }   
            if($parts[0] === 'edit'){
                $edits[] = $permission->id;
            }   
            if($parts[0] === 'add'){
                $addes[] = $permission->id;
            }   
            if($parts[0] === 'delete'){
                $deletes[] = $permission->id;
            }   
            if($parts[0] === 'update'){
                $updates[] = $permission->id;
            }   
            if($parts[0] === 'store'){
                $stores[] = $permission->id;
            }   
        }

        foreach($roles as $role){
            if($role->name === 'adder'){
                foreach($addes as $add){
                    DB::table('role_permission')->insert([
                        'permission_id' => $add,
                        'role_id' => $role->id
                    ]);
                }
                foreach($stores as $store){
                    DB::table('role_permission')->insert([
                        'permission_id' => $store,
                        'role_id' => $role->id
                    ]);
                }

            }
            if($role->name === 'editor'){
                foreach($edits as $edit){
                    DB::table('role_permission')->insert([
                        'permission_id' => $edit,
                        'role_id' => $role->id
                    ]);
                }
                foreach($updates as $update){
                    DB::table('role_permission')->insert([
                        'permission_id' => $update,
                        'role_id' => $role->id
                    ]);
                }
            }
            if($role->name === 'deleter'){
                foreach($deletes as $delete){
                    DB::table('role_permission')->insert([
                        'permission_id' => $delete,
                        'role_id' => $role->id
                    ]);
                }
            }
            if($role->name === 'viewer'){
                foreach($shows as $show){
                    DB::table('role_permission')->insert([
                        'permission_id' => $show,
                        'role_id' => $role->id
                    ]);
                }
            }
        }

        
    }
}
