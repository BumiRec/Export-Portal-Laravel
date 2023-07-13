<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserCompany;

class SummaryInformationService
{

    public function showUserData($companyId)
    {
        return UserCompany::join('users as u', 'u.id', 'user_company.user_id')
            ->join('company as c', 'c.id', 'user_company.company_id')
            ->where('company_id', $companyId)
            ->get(['u.name', 'u.email', 'u.phone_number']);
    }

    public function showCompanyData($userId)
    {
        return UserCompany::join('company', 'company.id', 'user_company.company_id')
            ->join('users', 'users.id', 'user_company.user_id')
            ->join('company_status', 'company_status.id', 'company.status_id')
            ->join('company_categories', 'company_categories.id', 'company.category_id')
            ->join('company_subcategories', 'company_subcategories.id', 'company.subcategory_id')
            ->where('user_id', $userId)
            ->get(['company.id', 'company.name as company_name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info',
                'company.budged', 'company.type', 'company_categories.name as category_name', 'company_subcategories.name as subcategory_name', 'company.membership', 'company_status.status']);
    }

    public function companyUser($userId)
    {
        $user = User::with('company:id,name')->find($userId);
        $companies = $user->company;
    
        $companyData = [];
    
        foreach ($companies as $company) {
            $companyData[] = [
                'id'   => $company->id,
                'name' => $company->name
            ];
        }
    
        return $companyData;
   

        // return UserCompany::join('company as c', 'c.id', 'user_company.company_id')
        //     ->where('user_id', $userId)
        //     ->get(['c.id', 'c.name']);
    }

    // public function userData($userId){
    //     return User::join('countries as c', 'users.country_id', 'c.id')
    //     ->where('users.id', $userId)
    //     ->get([ 'users.name', 'users.email', 'users.phone_number', 'c.country', 'users.gender']);
    // }
}
 