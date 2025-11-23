<?php

namespace Database\Seeders;

use App\Models\Admin\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Gender::create([
            'name' => 'male'
        ]);

        Gender::create([
            'name' => 'female'
        ]);
    }
}
