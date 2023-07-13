<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Seeder;

class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefixes = [
            ['prefix' => '+355', 'country' => 'Albania'],
            ['prefix' => '+32', 'country' => 'Belgium'],
            ['prefix' => '+385', 'country' => 'Croatia'],
            ['prefix' => '+33', 'country' => 'France'],
            ['prefix' => '+49', 'country' => 'Germany'],
            ['prefix' => '+30', 'country' => 'Greece'],
            ['prefix' => '+39', 'country' => 'Italy'],
            ['prefix' => '+377', 'country' => 'Monaco'],
            ['prefix' => '+382', 'country' => 'Montenegro'],
            ['prefix' => '+383', 'country' => 'Kosovo'],
            ['prefix' => '+41', 'country' => 'Switzerland'],
        ];


        Prefix::insert($prefixes);
    }
}
