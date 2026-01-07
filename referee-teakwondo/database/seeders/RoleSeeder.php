<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'adder',
            'editor',
            'deleter',
            'viewer'
        ];

        foreach($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }
    }
}
