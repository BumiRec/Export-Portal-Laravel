<?php

namespace App\Interfaces;

use App\Http\Requests\ManageCompaniesRequest;

interface ManageCompaniesInterface
{

    public function updateCompany(ManageCompaniesRequest $manageCompaniesRequest, $companyId);

    public function deleteCompany($companyId);

    public function deleteProduct($productId);
}