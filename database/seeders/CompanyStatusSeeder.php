<?php

namespace Database\Seeders;

use App\Models\CompanyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['status' => 'Preparing'],
            ['status' => 'Under'],
            ['status' => 'Reviewal'],
            ['status' => 'Approved'],
            ['status' => 'Disapproved']
        ];

        CompanyStatus::insert($status);
    }
}
