<?php

namespace Database\Seeders;

use App\Models\Favourite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favourite::factory()->count(333)->create();
    }
}
