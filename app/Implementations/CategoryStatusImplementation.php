<?php

namespace App\Implementations;

use App\Interfaces\CategoryStatusInterface;
use App\Http\Requests\CategoryStatusRequest;
use App\Models\Company;

class CategoryStatusImplementation implements CategoryStatusInterface{

    public function updateCategory(CategoryStatusRequest $categoryStatusRequest, $companyId){
        $company = Company::find($companyId);

        $company->category_id = $categoryStatusRequest->category_id;
        $company->subcategory_id = $categoryStatusRequest ->subcategory_id;
        $company->save();

        return 'Category upadated';
    }

    public function updateStatus(CategoryStatusRequest $categoryStatusRequest, $companyId){
        $company = Company::find($companyId);

        $company->status_id = $categoryStatusRequest->status_id;
        $company->save();

        return 'Status updated succesfully';

    }

}