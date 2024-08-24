<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\blog;
use App\Models\Main\blog_content;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // create blog
        for ($i = 0; $i < 5; $i++) {
            blog::create();
        }

        // Data untuk bahasa Inggris (en)
        blog_content::create([
            'blog_id' => 1,
            'language' => 'en',
            'title' => 'The Future of Technology',
            'description' => 'Exploring the innovations that will shape the future of technology.',
            'image' => 'our-product.webp',
            'slug' => 'the-future-of-technology',
            'visitor' => 120,
        ]);

        blog_content::create([
            'blog_id' => 2,
            'language' => 'en',
            'title' => 'Healthy Eating Habits',
            'description' => 'Tips and tricks to maintain a healthy diet.',
            'image' => 'our-product.webp',
            'slug' => 'healthy-eating-habits',
            'visitor' => 200,
        ]);

        blog_content::create([
            'blog_id' => 3,
            'language' => 'en',
            'title' => 'Travel Destinations for 2024',
            'description' => 'Top travel spots to visit in 2024.',
            'image' => 'our-product.webp',
            'slug' => 'travel-destinations-2024',
            'visitor' => 300,
        ]);

        blog_content::create([
            'blog_id' => 4,
            'language' => 'en',
            'title' => 'Effective Time Management',
            'description' => 'How to manage your time effectively in a busy world.',
            'image' => 'our-product.webp',
            'slug' => 'effective-time-management',
            'visitor' => 150,
        ]);

        blog_content::create([
            'blog_id' => 5,
            'language' => 'en',
            'title' => 'The Impact of Social Media',
            'description' => 'Understanding the influence of social media on society.',
            'image' => 'our-product.webp',
            'slug' => 'the-impact-of-social-media',
            'visitor' => 220,
        ]);

        // Data untuk bahasa Indonesia (id)
        blog_content::create([
            'blog_id' => 1,
            'language' => 'id',
            'title' => 'Masa Depan Teknologi',
            'description' => 'Menjelajahi inovasi yang akan membentuk masa depan teknologi.',
            'image' => 'our-product.webp',
            'slug' => 'masa-depan-teknologi',
            'visitor' => 100,
        ]);

        blog_content::create([
            'blog_id' => 2,
            'language' => 'id',
            'title' => 'Kebiasaan Makan Sehat',
            'description' => 'Tips dan trik untuk menjaga pola makan yang sehat.',
            'image' => 'our-product.webp',
            'slug' => 'kebiasaan-makan-sehat',
            'visitor' => 180,
        ]);

        blog_content::create([
            'blog_id' => 3,
            'language' => 'id',
            'title' => 'Destinasi Wisata untuk 2024',
            'description' => 'Tempat wisata teratas untuk dikunjungi pada tahun 2024.',
            'image' => 'our-product.webp',
            'slug' => 'destinasi-wisata-2024',
            'visitor' => 280,
        ]);

        blog_content::create([
            'blog_id' => 4,
            'language' => 'id',
            'title' => 'Manajemen Waktu yang Efektif',
            'description' => 'Cara mengelola waktu Anda dengan efektif di dunia yang sibuk.',
            'image' => 'our-product.webp',
            'slug' => 'manajemen-waktu-efektif',
            'visitor' => 140,
        ]);

        blog_content::create([
            'blog_id' => 5,
            'language' => 'id',
            'title' => 'Dampak Media Sosial',
            'description' => 'Memahami pengaruh media sosial terhadap masyarakat.',
            'image' => 'our-product.webp',
            'slug' => 'dampak-media-sosial',
            'visitor' => 210,
        ]);
    }
}
