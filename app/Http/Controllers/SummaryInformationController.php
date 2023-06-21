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

    public function userData(){

        return response()->json($this->summaryInformationService->showUserData(), 200);
    }

    public function companyData(){

        return response()->json($this->summaryInformationService->showCompanyData(), 200);
    }
}
