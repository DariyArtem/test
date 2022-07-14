<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->upsert([
            [
                'id' => 1,
                'name' => 'Action',
                'img_path' => 'img/category.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Classic',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 3,
                'name' => 'Detective',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 4,
                'name' => 'Mystery',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 5,
                'name' => 'Thriller',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 6,
                'name' => 'Fantasy',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 7,
                'name' => 'Romance',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 8,
                'name' => 'History',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 9,
                'name' => 'Horror',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 10,
                'name' => 'Science Fiction',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 11,
                'name' => 'Biographies and Autobiographies',
                'img_path' => 'img/category.jpg',

            ],
            [
                'id' => 12,
                'name' => 'Poetry',
                'img_path' => 'img/category.jpg',

            ],
        ], 'id');
    }
}
