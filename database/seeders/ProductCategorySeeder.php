<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_category') -> insert([
            ['name' => 'Fashion'],
            ['name' => 'Home'],
            ['name' => 'Acessories'],
            ['name' => 'Sporting'],
            ['name' => 'Health'],
            ['name' => 'Medical'],
            ['name' => 'Pets'],
        ]);
    }
}
