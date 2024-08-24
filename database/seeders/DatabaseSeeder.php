<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeaderSeeder::class,
            WhyUsSeeder::class,
            OurProductSeeder::class,
            ContactUsSeeder::class,
            SocialMediaSeeder::class,
            BlogSeeder::class,
            CardSeeder::class,
            SendEmailSeeder::class,
        ]);

    }
}
