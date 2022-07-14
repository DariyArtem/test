<?php

namespace Database\Seeders;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            FavSeeder::class,
        ]);

    }
}
