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
            ->get(['u.name', 'u.surname', 'u.email', 'u.phone_number', 'u.country_id', 'u.gender']);
    }

    public function showCompanyData($userId)
    {
        return UserCompany::join('company', 'company.id', 'user_company.company_id')
            ->join('users', 'users.id', 'user_company.user_id')
            ->join('company_status', 'company_status.id', 'company.status_id')
            ->join('company_categories', 'company_categories.id', 'company.category_id')
            ->join('company_subcategories', 'company_subcategories.id', 'company.subcategory_id')
            ->where('user_id', $userId)
            ->get(['company.id', 'company.name as company name', 'company.keywords', 'company.country', 'company.web_address', 'company.more_info',
                'company.budged', 'company.type', 'company_categories.name as category name', 'company_subcategories.name as subcategory name', 'company.membership', 'company_status.status']);
    }

    public function companyUser($userId)
    {

        return UserCompany::join('company as c', 'c.id', 'user_company.company_id')
            ->where('user_id', $userId)
            ->get(['c.id', 'c.name']);
    }

    public function userData($userId){
        return User::join('countries as c', 'users.country_id', 'c.id')
        ->where('id', $userId)
        ->get(['users.name', 'users.surname', 'users.email', 'users.phone_number', 'c.country']);
    }
}
