<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\card;
use App\Models\Main\card_content;

class CardSeeder extends Seeder
{
    public function run(): void
    {
        // create card
        card::create([
            'name' => 'John Doe',
            'position' => 'Software Engineer',
            'slug' => 'john-doe',
        ]);

        // Data untuk WhatsApp
        card_content::create([
            'card_id' => 1,
            'title' => 'WhatsApp',
            'description' => '087878987876',
        ]);

        // Data untuk Email
        card_content::create([
            'card_id' => 1,
            'title' => 'Email',
            'description' => 'cahayagrahaperkasa@gmail.com',
        ]);

        // Data untuk Instagram
        card_content::create([
            'card_id' => 1,
            'title' => 'Instagram',
            'description' => 'cahayaGrahaPerkasa',
        ]);

        // Data untuk TikTok
        card_content::create([
            'card_id' => 1,
            'title' => 'TikTok',
            'description' => 'cahayaGrahaPerkasa',
        ]);

        // Data untuk Facebook
        card_content::create([
            'card_id' => 1,
            'title' => 'Facebook',
            'description' => 'cahayaGrahaPerkasa',
        ]);

    }
}
