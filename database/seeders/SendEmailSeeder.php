<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\send_email;

class SendEmailSeeder extends Seeder
{
    public function run(): void
    {
        send_email::create([
            'name' => 'Cahaya Graha Perkasa',
            'contact' => '087878987876',
            'description' => 'Cahaya Graha Perkasa is a leading company in providing top-notch services and products.',
        ]);
    }
}
