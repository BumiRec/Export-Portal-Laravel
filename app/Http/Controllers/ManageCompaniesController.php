<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageCompaniesRequest;
use App\Interfaces\ManageCompaniesInterface;
use Illuminate\Http\Request;

class ManageCompaniesController extends Controller
{
    private ManageCompaniesInterface $manageCompaniesInterface;
    public function __construct(ManageCompaniesInterface $manageCompaniesInterface)
    {
        $this->manageCompaniesInterface = $manageCompaniesInterface;
    }

    public function manageCompanyData(ManageCompaniesRequest $manageCompaniesRequest, $companyId)
    {
        return response()->json($this->manageCompaniesInterface->updateCompany($manageCompaniesRequest, $companyId));
    }

    public function companyDeleted($companyId){
        return response()->json($this->manageCompaniesInterface->deleteCompany($companyId));
    }

    public function productDeleted($productId){
        return response()->json($this->manageCompaniesInterface->deleteProduct($productId));
    }
}