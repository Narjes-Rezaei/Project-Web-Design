<?php

namespace Database\Seeders;

use App\Models\Admin\EventRank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'yellow',
            'green',
            'blue',
            'red',
            'black',
            'black |',
            'black ||',
            'black |||',
            'black ||||',
            'black |||||',
        ];

        foreach($names as $name){
            EventRank::create([
                'name' => $name
            ]);
        }
    }
}
