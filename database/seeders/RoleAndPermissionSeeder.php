<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);
        $ownerRole = Role::create(['name' => 'owner']);
        $representativeRole = Role::create(['name' => 'representative']);
        
        $crateCompany = Permission::create(['name' => 'create company']);
        $updateCompany = Permission::create(['name' => 'update company']);

        $adminRole->givePermissionTo([$crateCompany, $updateCompany]);
        $ownerRole->givePermissionTo([$crateCompany, $updateCompany]);
        $userRole->givePermissionTo([$crateCompany, $updateCompany]);
        $representativeRole->givePermissionTo([$crateCompany, $updateCompany]);

    }
}
