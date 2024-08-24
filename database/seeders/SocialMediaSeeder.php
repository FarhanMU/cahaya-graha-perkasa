<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\social_media;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        social_media::create([
            'title' => 'LINE',
            'link' => 'https://line.me',
        ]);

        social_media::create([
            'title' => 'twitter',
            'link' => 'https://twitter.com',
        ]);

        social_media::create([
            'title' => 'TikTok',
            'link' => 'https://www.tiktok.com',
        ]);

        social_media::create([
            'title' => 'Instagram',
            'link' => 'https://www.instagram.com',
        ]);

        social_media::create([
            'title' => 'Facebook',
            'link' => 'https://www.facebook.com',
        ]);

        social_media::create([
            'title' => 'WhatsApp',
            'link' => 'https://www.whatsapp.com',
        ]);
    }
}
