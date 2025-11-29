<?php

namespace Database\Seeders;

use App\Models\Admin\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'twitter' => 'https://twitter.com/',
            'facebook' => 'https://facebook.com/',
            'instagram' => 'https://instagram.com/',
            'youtube' => 'https://www.youtube.com',
            'telegram' => 'https://telegram.me/'
        ]);
    }
}
