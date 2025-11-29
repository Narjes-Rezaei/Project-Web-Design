<?php

namespace Database\Seeders;

use App\Models\Admin\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'logo' => 'kukkiwon-seeklogo.png',
                'name' => 'kukkiwon',
                'number_of_member' => 2,
                'province_id' => 1,
                'gender_id' => 1
            ],
            [
                'logo' => 'taekwondo-indonesia-seeklogo.png',
                'name' => 'indonesia',
                'number_of_member' => 2,
                'province_id' => 17,
                'gender_id' => 2
            ],
            [
                'logo' => 'taekwondo-jansu-seeklogo.png',
                'name' => 'jansu',
                'number_of_member' => 2,
                'province_id' => 10,
                'gender_id' => 1
            ],
            [
                'logo' => 'the-world-taekwondo-federation-seeklogo.png',
                'name' => 'federation',
                'number_of_member' => 2,
                'province_id' => 20,
                'gender_id' => 2
            ],
            [
                'logo' => 'u-s-taekwondo-center-seeklogo.png',
                'name' => 'US',
                'number_of_member' => 2,
                'province_id' => 12,
                'gender_id' => 1
            ],

        ];

        foreach($teams as $team){
            Team::create([
                'logo' => $team['logo'],
                'name' => $team['name'],
                'number_of_member' => $team['number_of_member'],
                'province_id' => $team['province_id'],
                'gender_id' => $team['gender_id']
            ]);
        }
    }
}
