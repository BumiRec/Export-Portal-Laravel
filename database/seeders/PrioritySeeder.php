<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CompanyCategorySeeder::class,
            ProductCategorySeeder::class,
            CompanySubcategorySeeder::class,
            ProductSubcategorySeeder::class,
            ActivityAreaSeeder::class,
            // AdminSeeder::class,
            CountrySeeder::class,
            FileTypeSeeder::class,
            LanguageSeeder::class,
            CompanyStatusSeeder::class,
            PrefixSeeder::class,
            RoleAndPermissionSeeder::class,            
            DatabaseSeeder::class,
        ]);
    }
}
