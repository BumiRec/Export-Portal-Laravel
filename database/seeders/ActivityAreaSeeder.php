<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activity_area') -> insert([
            ['name' => 'Exporter'],
            ['name' => 'Importer'],
            ['name' => 'Servicer'],
            ['name' => 'Retailer'],
            ['name' => 'Wholesaler'],
            ['name' => 'Manifacturer'],
        ]);
    }
}
