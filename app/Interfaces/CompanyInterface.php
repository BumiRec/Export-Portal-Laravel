<?php

namespace App\Interfaces;

use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Resources\Json\JsonResource;

interface CompanyInterface
{

    public function createCompany(CompanyRequest $companyRequest, $userId): mixed;

    public function companyList(): JsonResource;

}
