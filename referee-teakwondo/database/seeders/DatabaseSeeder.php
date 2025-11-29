<?php

namespace Database\Seeders;

use App\Models\Admin\EventRank;
use App\Models\Admin\EventType;
use App\Models\Admin\Member;
use App\Models\Admin\Team;
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
        $this->call(EventRankSeeder::class);
        $this->call(EventTypeSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(MatchSeeder::class);
        $this->call(TeamMatchSeeder::class);
        $this->call(OurBlogSeeder::class);
        $this->call(MatchVideoSeeder::class);

    }
}
