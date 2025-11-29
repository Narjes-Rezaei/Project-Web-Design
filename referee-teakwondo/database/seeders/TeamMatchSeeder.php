<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team_matches = [
            [
                'match_id' => 1,
                'team1_id' => 1,
                'team2_id' => 3,
                'hour' => 14,
                'min' => 30
            ],
            [
                'match_id' => 1,
                'team1_id' => 3,
                'team2_id' => 5,
                'hour' => 9,
                'min' => 15
            ],
            [
                'match_id' => 1,
                'team1_id' => 2,
                'team2_id' => 4,
                'hour' => 18,
                'min' => 45
            ],
            [
                'match_id' => 1,
                'team1_id' => 1,
                'team2_id' => 5,
                'hour' => 11,
                'min' => 0
            ]
        ];

        foreach($team_matches as $team_matche){
            DB::table('team_match')->insert([
                'match_id' => $team_matche['match_id'],
                'team1_id' => $team_matche['team1_id'],
                'team2_id' => $team_matche['team2_id'],
                'hour' => $team_matche['hour'],
                'min' => $team_matche['min']
            ]);
        }
    }
}
