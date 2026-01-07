<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = [
            'user',
            'match-video',
            'our-blog',
            'event-rank',
            'permission',
            'event-type',
            'province',
            'role',
            'gender',
            'degree',
            'referee',
            'team',
            'members-team',
            'match',
            'social-media'
        ];
        $actions = [
            'show',
            'add',
            'edit',
            'store',
            'update',
            'delete'
        ];

        $permissions = [];

        foreach($actions as $action){
            foreach($entities as $entity){
                $permissions[] = $action .'-'. $entity;
            }
        } 

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

    }
}
