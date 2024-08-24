<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Main\our_product;
use App\Models\Main\our_product_content;

class OurProductSeeder extends Seeder
{
    public function run(): void
    {

        for ($i = 0; $i < 4; $i++) {
            our_product::create();
        }

        //en
        our_product_content::create([
            'our_product_id' => 1,
            'language' => 'en',
            'title' => 'product 1',
            'description' => 'This is a description of our featured product in English.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 2,
            'language' => 'en',
            'title' => 'product 2',
            'description' => 'This is a description of our featured product in English.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 3,
            'language' => 'en',
            'title' => 'product 3',
            'description' => 'This is a description of our featured product in English.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 4,
            'language' => 'en',
            'title' => 'product 3',
            'description' => 'This is a description of our featured product in English.',
            'image' => 'our-product.webp',
        ]);

        //id
        our_product_content::create([
            'our_product_id' => 1,
            'language' => 'id',
            'title' => 'produk 1',
            'description' => 'Ini adalah deskripsi produk unggulan kami dalam bahasa Indonesia.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 2,
            'language' => 'id',
            'title' => 'produk 2',
            'description' => 'Ini adalah deskripsi produk unggulan kami dalam bahasa Indonesia.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 3,
            'language' => 'id',
            'title' => 'produk 3',
            'description' => 'Ini adalah deskripsi produk unggulan kami dalam bahasa Indonesia.',
            'image' => 'our-product.webp',
        ]);

        our_product_content::create([
            'our_product_id' => 4,
            'language' => 'id',
            'title' => 'produk 4',
            'description' => 'Ini adalah deskripsi produk unggulan kami dalam bahasa Indonesia.',
            'image' => 'our-product.webp',
        ]);

    }
}
