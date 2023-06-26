<?php
namespace App\Implementations;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyListResource;
use App\Interfaces\CompanyInterface;
use App\Models\Company;
use App\Models\UserCompany;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyImplementation implements CompanyInterface
{

    public function createCompany(CompanyRequest $companyRequest, $userId): Company
    {
        $company = Company::create(
            [
                'name'            => $companyRequest['name'],
                'keywords'        => $companyRequest['keywords'],
                'country'         => $companyRequest['country'],
                'web_address'     => $companyRequest['web_address'],
                'more_info'       => $companyRequest['more_info'],
                'budged'          => $companyRequest['budged'],
                'type'            => $companyRequest['type'],
                'taxpayer_office' => $companyRequest['taxpayer_office'],
                'TIN'             => $companyRequest['TIN'],
                'category_id'     => $companyRequest['category_id'],
                'subcategory_id'  => $companyRequest['subcategory_id'],
            ]
        );

        if ($company) {
            UserCompany::create([
                'user_id'    => $userId,
                'company_id' => $company->id,
            ]);
        }

        $keywordsArray = explode(",", $companyRequest['keywords']);

        return $company;
    }

    public function companyList(): JsonResource
    {
        return CompanyListResource::collection(Company::paginate(10));
    }

}
