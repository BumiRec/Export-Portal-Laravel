<?php

namespace App\Interfaces;
use App\Http\Requests\CompanyRequest;
use App\Models\company;
use Illuminate\Http\Resources\Json\JsonResource;

interface CompanyInterface{

    public function createCompany(CompanyRequest $companyRequest, $userId):Company;

    public function companyList():JsonResource;

}
