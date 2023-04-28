<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AdminSeeder::class);

        // \App\Models\User::factory(10)->create();


        //     FOR FUTURE USE
        
        // use Spatie\Permission\Models\Role;
        // use Spatie\Permission\Models\Permission;

        // // Create roles
        // $adminRole = Role::create(['name' => 'admin']);
        // $userRole = Role::create(['name' => 'user']);

        // // Create permissions
        // $createPermission = Permission::create(['name' => 'create']);
        // $editPermission = Permission::create(['name' => 'edit']);
        // $deletePermission = Permission::create(['name' => 'delete']);

        // // Assign permissions to roles
        // $adminRole->givePermissionTo($createPermission);
        // $adminRole->givePermissionTo($editPermission);
        // $adminRole->givePermissionTo($deletePermission);

        // $userRole->givePermissionTo($createPermission);


    }
}
