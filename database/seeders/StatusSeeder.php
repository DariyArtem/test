<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->upsert([
            [
              'id' => 1,
              'status' => 'Active'
            ],
            [
                'id' => 2,
                'status' => 'Banned'
            ],
        ], 'id');
    }
}
