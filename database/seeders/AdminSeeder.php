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
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'rezon',
        //     'email' => 'rezon@user.com',
        //     'password' => bcrypt('123'),
        // ]);
        // $user->assignRole($role);

        $role = Role::create(['name' => 'admin']);
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $user->assignRole($role);

        // $role = Role::create(['name' => 'user']);
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'rrezon',
        //     'email' => 'rrezon@user.com',
        //     'password' => bcrypt('12345'),
        // ]);
        // $user->assignRole($role);



        // $role = Role::create(['name' => 'admin']);
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Test ADMIN',
        //     'email' => 'shkelqim.hajrizi@protonmail.ch',
        //     'password' => bcrypt('123'),
        // ]);
        // $user->assignRole($role);




        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'gentdushi@protonmail.ch',
            'surname' =>'dushi',
            'phone_number' => '+383',
            'country' => 'Albania',
            'gender' => 'm',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole($role);


    }
}
