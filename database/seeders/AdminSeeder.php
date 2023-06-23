<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $AdminRole  = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'Edit User Profile']);
        $user       = User::factory()->create([
            'name'         => 'Geri',
            'email'        => 'geri@protonmail.ch',
            'surname'      => 'Morina',
            'phone_number' => '+383',
            'country_id'   => 1,
            'gender'       => 'm',
            'password'     => bcrypt('123'),
        ]);
        $user->assignRole($AdminRole);
        $permission->assignRole($AdminRole);
    }
}
