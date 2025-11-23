<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'saleh',
            'family' => 'askari',
            'phone' => '09909944001',
            'email' => 'salehaskari.4992@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Narjes',
            'family' => 'Rezaie',
            'phone' => '09189653781',
            'email' => 'n978666@gmial.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'asghar',
            'family' => 'mohammadi',
            'phone' => '09184329876',
            'email' => 'asghar@gmial.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'parsa',
            'family' => 'hosseini',
            'phone' => '09194329876',
            'email' => 'hoseini@gmial.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'narges',
            'family' => 'rezaei',
            'phone' => '09139653781',
            'email' => 'rezaei@gmial.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
