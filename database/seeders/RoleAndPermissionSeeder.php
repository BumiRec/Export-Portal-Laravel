<?php

namespace Database\Seeders;

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
        $userRole           = Role::create(['name' => 'user']);
        $adminRole          = Role::create(['name' => 'admin']);
        $ownerRole          = Role::create(['name' => 'owner']);
        $representativeRole = Role::create(['name' => 'representative']);

        $createCompany         = Permission::create(['name' => 'create-company']);
        $logout                = Permission::create(['name' => 'logout']);
        $activityArea          = Permission::create(['name' => 'activity-area-for-company']);
        $addProduct            = Permission::create(['name' => 'add-product']);
        $buyConfirmed          = Permission::create(['name' => 'buy-confirmation']);
        $sellConfirmed         = Permission::create(['name' => 'sell-confirmation']);
        $buyerList             = Permission::create(['name' => 'buyer-list']);
        $sellerList            = Permission::create(['name' => 'seller-list']); //created after buyer confirm the buy
        $subscribeToNewsletter = Permission::create(['name' => 'subscribe-to-newsletter']);
        $sendNewsletter        = Permission::create(['name' => 'send-newsletter']);
        $addFile               = Permission::create(['name' => 'add-file']);
        $searchCompany         = Permission::create(['name' => 'search-company']);
        $searchUser            = Permission::create(['name' => 'search-user']);
        $searchProduct         = Permission::create(['name' => 'search-product']);
        $sendSupportEmail      = Permission::create(['name' => 'send-support-e-mail']);
        $addSuccessStories     = Permission::create(['name' => 'add-success-story']);
        $addAnnounements       = Permission::create(['name' => 'add-announcements']);

        $deleteProduct = Permission::create(['name' => 'delete-product']);
        $deleteFile    = Permission::create(['name' => 'delete-file']);
        $deleteCompany = Permission::create(['name' => 'delete-company']);

        $updateCompany       = Permission::create(['name' => 'update-company']);
        $updateUser          = Permission::create(['name' => 'update-user-profile']);
        $changePassword      = Permission::create(['name' => 'change-password']);
        $announcementsUpdate = Permission::create(['name' => 'update-announcements']);
        $updateCategory      = Permission::create(['name' => 'update-category-for-company']);
        $updateCompanyStatus = Permission::create(['name' => 'update-company-status']);
        $uploadFile          = Permission::create(['name' => 'upload-file']);

        //admin roles
        $adminRole->givePermissionTo([$createCompany, $updateCompanyStatus, $addProduct, $sendNewsletter,
            $searchUser, $addSuccessStories, $addAnnounements, $announcementsUpdate, $deleteCompany,
            $uploadFile, $deleteProduct, $changePassword]);

        //owner roles
        $ownerRole->givePermissionTo([$createCompany, $updateCompany, $sellConfirmed, $sellerList, $addFile,
            $deleteFile, $changePassword, $updateCategory, $uploadFile]);

        //user roles
        $userRole->givePermissionTo([$createCompany, $updateCompany, $logout, $activityArea, $buyConfirmed,
            $buyerList, $subscribeToNewsletter, $searchCompany, $searchProduct, $sendSupportEmail, $updateUser, $changePassword]);

        $representativeRole->givePermissionTo([$createCompany, $updateCompany]);

    }
}
