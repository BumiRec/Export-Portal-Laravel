<?php

namespace App\Implementations;

use App\Http\Requests\ManageCompaniesRequest;
use App\Interfaces\ManageCompaniesInterface;
use App\Models\Company;

class ManageCompaniesImplementation implements ManageCompaniesInterface
{

    public function updateCompany(ManageCompaniesRequest $manageCompaniesRequest, $companyId)
    {

        $updateCompany = Company::findOrFail($companyId);
        $updateCompany->update($manageCompaniesRequest->validated());

        if ($updateCompany) {
            return 'Company updated succesfuly';
        } else {
            return 'Company not found';
        }
    }
}