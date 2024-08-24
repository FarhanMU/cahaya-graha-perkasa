<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\header;
use App\Models\Main\header_content;

class HeaderSeeder extends Seeder
{
    public function run(): void
    {
        header::create();

        header_content::create([
            'header_id' => 1,
            'language' => 'en',
            'title' => 'One Stop Solution For Your Project',
            'description' => 'Welcome to Cahaya Graha Perkasa, the premier choice for all your steel construction needs. Whether you re embarking on a commercial, industrial, or residential project, we provide comprehensive solutions that ensure durability, efficiency, and excellence.',
        ]);

        header_content::create([
            'header_id' => 1,
            'language' => 'id',
            'title' => 'Solusi Satu Pintu Untuk Proyek Anda',
            'description' => 'Selamat datang di Cahaya Graha Perkasa, pilihan utama untuk segala kebutuhan konstruksi baja Anda. Baik Anda memulai proyek komersial, industri, atau perumahan, kami memberikan solusi komprehensif yang menjamin ketahanan, efisiensi, dan keunggulan.',
        ]);
    }
}
