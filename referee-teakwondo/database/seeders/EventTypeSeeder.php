<?php

namespace Database\Seeders;

use App\Models\Admin\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Kyorugi (Sparring)',
            'Poomsae (Forms)',
            'Team Poomsae',
            'Freestyle Poomsae',
            'Breaking (Gyokpa)',
            'Speed Kicking',
            'Team Kyorugi',
            'Mixed Team Poomsae',
            'Demonstration Event',
            'Para Taekwondo'
        ];

        foreach($names as $name){
            EventType::create([
                'name' => $name
            ]);
        }
    }
}
