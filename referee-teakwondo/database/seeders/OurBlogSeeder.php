<?php

namespace Database\Seeders;

use App\Models\OurBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $match_videos = [
            [
                'title' => '日本では、人々の足跡が電気に変わる！',
                'text' => 'Taekwondo is more than a martial art; it is a mental path that builds discipline, focus, and inner strength.',
                'image' => 'allen-tanzadeh-js6cGb_SMKk-unsplash.jpg',
                'video' => 'https://www.instagram.com/reel/DRC2atpDDBm/?igsh=bDU1YjQ5ZGsyYTZx'
            ],
            [
                'title' => 'Head Shot',
                'text' => 'Every movement in Taekwondo is a blend of art, balance, and power that awakens the warrior spirit within.',
                'image' => 'background.jpeg',
                'video' => 'https://www.instagram.com/reel/DQ3xXpfDC4c/?igsh=Y3AwaGpiY3FlbHdw'
            ],
            [
                'title' => 'Kids Match',
                'text' => 'In Taekwondo, you learn that before defeating your opponent, you must first overcome your own fears.',
                'image' => 'background1.jpeg',
                'video' => 'https://www.instagram.com/reel/DQvxocOjMSS/?igsh=bXlmdXIwcGI0Zjg0'
            ],
            [
                'title' => 'Head Shot',
                'text' => 'The journey through Taekwondo belt levels is a story of personal growth—from the innocence of white to the mastery of black.',
                'image' => 'nguyen-hung-R1ftFeTKEbk-unsplash.jpg',
                'video' => 'https://www.instagram.com/reel/DP-lwP6ioLx/?igsh=b3FrcXd2c29hcTZ0'
            ],
            [
                'title' => 'Best Shot',
                'text' => 'Taekwondo teaches you that true victory lies not only in the result but in dedication, perseverance, and respect.',
                'image' => 'dragon-white-munthe-3kxbyD0MlhU-unsplash.jpg',
                'video' => 'https://www.instagram.com/reel/DPjonW-jHpt/?igsh=cW8xdmZscmg2Zjlj'
            ]
        ];

        foreach ($match_videos as $match_video) {
            OurBlog::create([
                'title' => $match_video['title'],
                'text' => $match_video['text'],
                'image' => $match_video['image'],
                'link' => $match_video['video']
            ]);
        }
    }
}
