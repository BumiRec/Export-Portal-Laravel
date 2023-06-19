<?php

namespace App\Http\Controllers;

use App\Services\CompanyFilterService;

class CompanyFilterController extends Controller
{
    private CompanyFilterService $companyFilterService;

    public function __construct(CompanyFilterService $companyFilterService)
    {
        $this->companyFilterService = $companyFilterService;
    }
    public function filterCompany(CompanyFilterService $companyFilterService, $id)
    {
        return response()->json($this->companyFilterService->companyFilter($id), 200);
    }
}
