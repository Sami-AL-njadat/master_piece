<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productName' => 'Sample Product 1',
            'Sdescription' => 'Short description for Sample Product 1',
            'Ldescription' => 'Long description for Sample Product 1',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 2',
            'Sdescription' => 'Short description for Sample Product 2',
            'Ldescription' => 'Long description for Sample Product 2',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 3',
            'Sdescription' => 'Short description for Sample Product 3',
            'Ldescription' => 'Long description for Sample Product 3',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 2, // Replace with an existing category ID
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 4',
            'Sdescription' => 'Short description for Sample Product 4',
            'Ldescription' => 'Long description for Sample Product 4',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 5',
            'Sdescription' => 'Short description for Sample Product 5',
            'Ldescription' => 'Long description for Sample Product 5',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
        ]);
    }
}
