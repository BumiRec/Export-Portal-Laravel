<?php

namespace App\Services;

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
        return UserCompany::join('company as c', 'c.id', 'user_company.company_id')
            ->join('users as u', 'u.id', 'user_company.user_id')
            ->join('company_status as cs', 'cs.id', 'c.status_id')
            ->join('company_categories as cc', 'cc.id', 'c.category_id')
            ->join('company_subcategories as csb', 'csb.id', 'c.subcategory_id')
            ->where('user_id', $userId)
            ->get(['c.id', 'c.name', 'c.keywords', 'c.country', 'c.web_address', 'c.more_info',
                'c.budged', 'c.type', 'cc.name', 'csb.name', 'c.membership', 'cs.status']);
    }

    public function companyUser($userId)
    {

        return UserCompany::join('company as c', 'c.id', 'user_company.company_id')
            ->where('user_id', $userId)
            ->get(['c.id', 'c.name']);
    }
}
