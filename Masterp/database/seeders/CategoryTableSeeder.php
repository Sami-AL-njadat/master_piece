<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryName' => 'House plants',
            'description' => 'House plants, a green addition to indoor spaces, enhance aesthetics and air quality. Discover the beauty of nature indoors with easy-to-care-for and diverse house plant varieties.',
            'image' => 'http://127.0.0.1:8000/image/mas/img/cdc-wz3ijPHvL54-unsplash.jpg',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Office plants',
            'description' => 'Office plants enhance workspace aesthetics and air quality, fostering a healthier and more productive environment. Choose low-maintenance varieties to bring greenery and positivity to your office setting.',
            'image' => 'http://127.0.0.1:8000/image/mas/img/pexels-kaboompics-com-5808.jpg',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Accessories',
            'description' => 'Elevate your plant style with put planters and stands, adding a touch of sophistication to your space. Explore practical accessories like watering cans and decorative stones for a complete botanical aesthetic.',
            'image' => 'http://127.0.0.1:8000/image/mas/img/seeds1.jpg',
        ]);
        
    }
}
