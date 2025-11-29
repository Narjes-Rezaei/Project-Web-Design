<?php

namespace Database\Seeders;

use App\Models\Home\MatchVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $match_videos = [
            [
                'title' => '日本では、人々の足跡が電気に変わる！',
                'image' => '0c6faaa4-cb5e-4f21-b5b2-5a621edef14a.jpeg',
                'video' => 'https://www.instagram.com/reel/DRC2atpDDBm/?igsh=bDU1YjQ5ZGsyYTZx'
            ],
            [
                'title' => 'Head Shot',
                'image' => '1d5cfa15-1e54-4f6c-b7ea-5963c639d595.jpeg',
                'video' => 'https://www.instagram.com/reel/DQ3xXpfDC4c/?igsh=Y3AwaGpiY3FlbHdw'
            ],
            [
                'title' => 'Kids Match',
                'image' => 'd0b7d6bd-fe3e-407c-89f8-af87fbbceb62.jpeg',
                'video' => 'https://www.instagram.com/reel/DQvxocOjMSS/?igsh=bXlmdXIwcGI0Zjg0'
            ],
            [
                'title' => 'Head Shot',
                'image' => 'kt-leung-bBSfoCPdBgk-unsplash.jpg',
                'video' => 'https://www.instagram.com/reel/DP-lwP6ioLx/?igsh=b3FrcXd2c29hcTZ0'
            ],
            [
                'title' => 'Best Shot',
                'image' => 'Taekwondo Sparring Match in a Dojang.jpeg',
                'video' => 'https://www.instagram.com/reel/DPjonW-jHpt/?igsh=cW8xdmZscmg2Zjlj'
            ]
        ];

        foreach ($match_videos as $match_video) {
            MatchVideo::create([
                'title' => $match_video['title'],
                'image' => $match_video['image'],
                'video' => $match_video['video']
            ]);
        }
    }
}
