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
use App\Models\UserCompany;

class ManageCompaniesImplementation implements ManageCompaniesInterface
{

    public function updateCompany(ManageCompaniesRequest $manageCompaniesRequest, $companyId)
    {

        $updateCompany = Company::find($companyId);
        $updateCompany->update($manageCompaniesRequest->validated());

        if ($updateCompany) {
            return 'Company updated succesfuly';
        } else {
            return 'Company not found';
        }
    }

    public function deleteCompany($companyId)
    {

        $company = Company::find($companyId);

        $products = Product::where('company_id', $company->id)->get();

       // return $product;

       foreach($products as $product){
        ExportProduct::where('product_id', $product->id)->delete();
        ImportProduct::where('product_id', $product->id)->delete();
       }

        UserCompany::where('company_id', $company->id)->delete();

        ActivityCompany::where('company_id', $company->id)->delete();

        Product::where('company_id', $company->id)->delete();

        SuccessStories::where('company_id', $company->id)->delete();

        Corporate::where('company_id', $company->id)->delete();

        $company->delete();

        return 'Company deleted successfuly';

    }


    public function deleteProduct($productId){

        $product = Product::find($productId);

        $buyerId = BuyerConfirmation::where('product_id', $product->id)->get();

       //return $buyerId;

        // foreach($buyerId as $id){
        //     BuyerList::where('buyer_id', $id->id)->delete();
        // }
    
        ExportProduct::where('product_id', $product->id)->delete();
        ImportProduct::where('product_id', $product->id)->delete();
    
        Transaction::where('product_id', $product->id)->delete();
        SellerConfirmation::where('product_id', $product->id)->delete();
        SellerList::where('product_id', $product->id)->delete();
    
        BuyerConfirmation::where('product_id', $product->id)->delete();
    
        BuyerList::where('product_id', $product->id)->delete();
        FileHasProduct::where('product_id', $product->id)->delete();
        

        $product->delete();

        return 'Product deleted sucessfuly';
    }
}