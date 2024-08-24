<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\contact_us;
use App\Models\Main\contact_us_content;

class ContactUsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            contact_us::create();
        }

        // Data untuk bahasa Inggris (en)
        contact_us_content::create([
            'contact_us_id' => 1,
            'language' => 'en',
            'title' => 'Address',
            'description' => 'Jl. Buni No.19, RT.9/RW.5, Mangga Besar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11180',
        ]);

        contact_us_content::create([
            'contact_us_id' => 2,
            'language' => 'en',
            'title' => 'Email',
            'description' => 'cahayaGrahaPerkasa@gmail.com',
        ]);

        contact_us_content::create([
            'contact_us_id' => 3,
            'language' => 'en',
            'title' => 'Working Hour',
            'description' => '10AM - 10PM',
        ]);

        contact_us_content::create([
            'contact_us_id' => 4,
            'language' => 'en',
            'title' => 'Factory Phone Number',
            'description' => '0251-7677-9897',
        ]);

        contact_us_content::create([
            'contact_us_id' => 5,
            'language' => 'en',
            'title' => 'Customer Service Phone Number',
            'description' => '08787676556',
        ]);

        // Data untuk bahasa Indonesia (id)
        contact_us_content::create([
            'contact_us_id' => 1,
            'language' => 'id',
            'title' => 'Alamat',
            'description' => 'Jl. Buni No.19, RT.9/RW.5, Mangga Besar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11180',
        ]);

        contact_us_content::create([
            'contact_us_id' => 2,
            'language' => 'id',
            'title' => 'Email',
            'description' => 'cahayaGrahaPerkasa@gmail.com',
        ]);

        contact_us_content::create([
            'contact_us_id' => 3,
            'language' => 'id',
            'title' => 'Jam Kerja',
            'description' => '10AM - 10PM',
        ]);

        contact_us_content::create([
            'contact_us_id' => 4,
            'language' => 'id',
            'title' => 'No Telepon Pabrik',
            'description' => '0251-7677-9897',
        ]);

        contact_us_content::create([
            'contact_us_id' => 5,
            'language' => 'id',
            'title' => 'No Telepon CS',
            'description' => '08787676556',
        ]);
    }
}
