<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SubcategorySeeder;
use Database\Seeders\ActivityAreaSeeder;
use Database\Seeders\ProductCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\company;
use App\Models\product;
use App\Models\product_category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // DUMMY DATA  --  DONT CHANGE THE ORDER OF SEEDS

            // Seed the countries table
        \App\Models\countries::factory(20)->create();

            // Seed the producct category table
        \App\Models\product_category::factory(20)->create();

            // Seed the company table
        company::factory(10)->create();

            // Seed the product table
        \App\Models\product::factory(20)->create();

            // Seed the activity table - no more then 6
        \App\Models\activity_area::factory(6)->create();


        // comment this line when migrate seed for more then 1 time
        // or just migrate:fresh --seed
        $this->call(AdminSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory(10)->create();
    }
}
