<?php

namespace Database\Seeders;

use App\Models\Admin\GameMatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matches = [[
            'event_title' => 'World Taekwondo Championships',
            'event_date' => '2025-12-10 14:30:00',
            'province_id' => 1,
            'event_rank_id' => 1,
            'event_type_id' => 1
        ],
        [
            'event_title' => 'World Taekwondo Grand Prix',
            'event_date' => '2026-01-05 09:15:00',
            'province_id' => 2,
            'event_rank_id' => 2,
            'event_type_id' => 2
        ],[
            'event_title' => 'World Taekwondo Grand Slam',
            'event_date' => '2026-03-22 18:45:00',
            'province_id' => 3,
            'event_rank_id' => 3,
            'event_type_id' => 3
        ],[
            'event_title' => 'World Taekwondo Poomsae Championships',
            'event_date' => '2026-07-11 11:00:00',
            'province_id' => 4,
            'event_rank_id' => 4,
            'event_type_id' => 4
        ],[
            'event_title' => 'World Taekwondo Team Championships',
            'event_date' => '2026-10-29 20:20:00',
            'province_id' => 5,
            'event_rank_id' => 5,
            'event_type_id' => 5
        ],
    ];

    foreach($matches as $match){
        GameMatch::create([
            'event_title' => $match['event_title'],
            'event_date' => $match['event_date'],
            'province_id' => $match['province_id'],
            'event_rank_id' => $match['event_rank_id'],
            'event_type_id' => $match['event_type_id']
        ]);
    }
    }
}
