<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenderSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DegreeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RefereeSeeder::class);
    }
}
