<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\why_us;
use App\Models\Main\why_us_content;

class WhyUsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            why_us::create();
        }

        //id
        why_us_content::create([
            'why_us_id' => 1,
            'language' => 'id',
            'title' => 'Jaminan Kualitas',
            'description' => 'Kami menjamin kualitas superior dalam setiap aspek layanan kami, mulai dari bahan hingga pengerjaan.',
        ]);

        why_us_content::create([
            'why_us_id' => 2,
            'language' => 'id',
            'title' => 'Solusi yang Disesuaikan',
            'description' => 'Solusi yang disesuaikan dengan kebutuhan spesifik proyek Anda dan melampaui harapan Anda.',
        ]);

        why_us_content::create([
            'why_us_id' => 3,
            'language' => 'id',
            'title' => 'Tim Berpengalaman',
            'description' => 'Tim profesional kami yang terampil membawa pengalaman dan keahlian bertahun-tahun dalam industri ke proyek Anda.',
        ]);

        why_us_content::create([
            'why_us_id' => 4,
            'language' => 'id',
            'title' => 'Harga Kompetitif',
            'description' => 'Menawarkan nilai tanpa mengorbankan kualitas, kami menyediakan harga kompetitif yang sesuai dengan anggaran Anda.',
        ]);


        //en
        why_us_content::create([
            'why_us_id' => 1,
            'language' => 'en',
            'title' => 'Quality Assurance',
            'description' => 'We guarantee superior quality in every aspect of our service, from materials to workmanship.',
        ]);

        why_us_content::create([
            'why_us_id' => 2,
            'language' => 'en',
            'title' => 'Customized Solutions',
            'description' => 'Tailored solutions that meet your specific project requirements and exceed your expectations.',
        ]);

        why_us_content::create([
            'why_us_id' => 3,
            'language' => 'en',
            'title' => 'Experienced Team',
            'description' => 'Our team of skilled professionals brings years of industry experience and expertise to your project.',
        ]);

        why_us_content::create([
            'why_us_id' => 4,
            'language' => 'en',
            'title' => 'Competitive Pricing',
            'description' => 'Offering value without compromising on quality, we provide competitive pricing to fit your budget.',
        ]);
    }
}
