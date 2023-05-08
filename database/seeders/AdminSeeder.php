<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'commander']);

        $role = Role::create(['name' => 'admin']);


        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'gentdushi@protonmail.ch',
            'surname' => 'dushi',
            'phone_number' => '+383',
            'country_id' => 1,
            'gender' => 'm',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole($role);
    }
}
