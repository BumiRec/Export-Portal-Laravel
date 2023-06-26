<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Corporate;
use App\Models\Countries;
use App\Models\ExportProduct;
use App\Models\ImportProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // DUMMY DATA  --  DONT CHANGE THE ORDER OF SEEDS

        // Seed the countries table
        Countries::factory(20)->create();

        // Seed the producct category table
        // \App\Models\product_category::factory(20)->create();

        // Seed the company table
        Company::factory(10)->create();

        // Seed the product table
        Product::factory(20)->create();

        // comment this line when migrate seed for more then 1 time
        // or just migrate:fresh --seed
        User::factory(20)->create();

        // token::factory(20)->create();

        ExportProduct::factory(10)->create();

        ImportProduct::factory(10)->create();

        Corporate::factory(10)->create();

        // usersToken::factory(20)->create();

        // \App\Models\User::factory(10)->create();
    }
}
