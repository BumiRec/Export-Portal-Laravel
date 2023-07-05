<?php

namespace App\Implementations;

use App\Http\Requests\ManageCompaniesRequest;
use App\Interfaces\ManageCompaniesInterface;
use App\Models\ActivityCompany;
use App\Models\BuyerConfirmation;
use App\Models\BuyerList;
use App\Models\Company;
use App\Models\Corporate;
use App\Models\ExportProduct;
use App\Models\FileHasProduct;
use App\Models\ImportProduct;
use App\Models\Product;
use App\Models\SellerConfirmation;
use App\Models\SellerList;
use App\Models\SuccessStories;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCompany;
use App\Notifications\NotificationsByAdmin;

class ManageCompaniesImplementation implements ManageCompaniesInterface
{

    public function updateCompany(ManageCompaniesRequest $manageCompaniesRequest, $companyId)
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        if (!$admin) {
            return 'Admin not found';
        }

        $updateCompany = Company::find($companyId);

        if (!$updateCompany) {
            return 'Company not found';
        }

        $updateCompany->update($manageCompaniesRequest->validated());

        $userIds       = UserCompany::where('company_id', $updateCompany->id)->pluck('user_id')->toArray();
        $companyOwners = User::whereIn('id', $userIds)->get();

        foreach ($companyOwners as $user) {
            $notification = new NotificationsByAdmin(null, $updateCompany);
            $user->notify($notification);
        }

        return 'Company updated successfully';
    }

    public function deleteCompany($companyId)
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        if (!$admin) {
            return 'Admin not found';
        }

        $company = Company::find($companyId);

        if (!$company) {
            return 'Company not found';
        }

        $userIds       = UserCompany::where('company_id', $company->id)->pluck('user_id')->toArray();
        $companyOwners = User::whereIn('id', $userIds)->get();
        $products      = Product::where('company_id', $company->id)->get();
        foreach ($companyOwners as $user) {
            $notification = new NotificationsByAdmin(null, $company);
            $user->notify($notification);
        }

        foreach ($products as $product) {
            ExportProduct::where('product_id', $product->id)->delete();
            ImportProduct::where('product_id', $product->id)->delete();
            Transaction::where('product_id', $product->id)->delete();
            SellerConfirmation::where('product_id', $product->id)->delete();
            SellerList::where('product_id', $product->id)->delete();
            BuyerConfirmation::where('product_id', $product->id)->delete();
            BuyerList::where('product_id', $product->id)->delete();
            FileHasProduct::where('product_id', $product->id)->delete();
        }

        UserCompany::where('company_id', $company->id)->delete();
        ActivityCompany::where('company_id', $company->id)->delete();
        Product::where('company_id', $company->id)->delete();
        SuccessStories::where('company_id', $company->id)->delete();
        Corporate::where('company_id', $company->id)->delete();

        $company->delete();

        return 'Company deleted successfully';
    }

    public function deleteProduct($productId)
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        $product = Product::find($productId);

        if (!$admin) {
            return 'Admin not found';
        }

        if (!$product) {
            return 'Product not found';
        }

        $buyerId = BuyerConfirmation::where('product_id', $product->id)->pluck('id');

        $userIds = UserCompany::join('company', 'user_company.company_id', '=', 'company.id')
            ->join('product', 'company.id', '=', 'product.company_id')
            ->where('product.id', $product->id)
            ->pluck('user_company.user_id');
        $companyName = UserCompany::join('company', 'user_company.company_id', '=', 'company.id')
            ->join('product', 'company.id', '=', 'product.company_id')
            ->where('product.id', $product->id)
            ->value('company.name');
        echo $companyName;
        $companyOwners = User::whereIn('id', $userIds)->get();

        foreach ($companyOwners as $user) {
            $notification = new NotificationsByAdmin($product, $companyName);
            $user->notify($notification);
        }
        BuyerList::whereIn('buyer_id', $buyerId)->delete();

        ExportProduct::where('product_id', $product->id)->delete();
        ImportProduct::where('product_id', $product->id)->delete();
        Transaction::where('product_id', $product->id)->delete();
        SellerConfirmation::where('product_id', $product->id)->delete();
        SellerList::where('product_id', $product->id)->delete();
        BuyerConfirmation::where('product_id', $product->id)->delete();
        FileHasProduct::where('product_id', $product->id)->delete();

        $product->delete();

        return 'Product deleted successfully';
    }

}
