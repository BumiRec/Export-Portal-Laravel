<?php

namespace App\Http\Controllers;

use App\Services\SummaryInformationService;
use Illuminate\Http\Request;

class SummaryInformationController extends Controller
{
    private SummaryInformationService $summaryInformationService;
    public function __construct(SummaryInformationService $summaryInformationService){
        $this->summaryInformationService = $summaryInformationService;
    }

    public function userData($companyId){

        return response()->json($this->summaryInformationService->showUserData($companyId), 200);
    }

    public function companyData($userId){

        return response()->json($this->summaryInformationService->showCompanyData($userId), 200);
    }

    public function userCompany($userId){

        return response()->json($this->summaryInformationService->companyUser($userId), 200);
    }

    public function user($userId){
        return response()->json($this->summaryInformationService->userData($userId), 200);
    }
}
