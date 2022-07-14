<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->upsert([
            [
                'id' => 1,
                'name' => 'User',
            ],
            [
                'id' => 2,
                'name' => 'Admin',
            ],

        ], 'id');
    }
}
