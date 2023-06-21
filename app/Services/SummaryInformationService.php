<?php

namespace App\Services;

use App\Models\UserCompany;

class SummaryInformationService
{

    public function showUserData()
    {
        return UserCompany::join('users as u', 'u.id', 'user_company.user_id')
            ->get(['u.name', 'u.surname', 'u.email', 'u.phone_number', 'u.country_id', 'u.gender']);
    }

    public function showCompanyData()
    {
        return UserCompany::join('company as c', 'c.id', 'user_company.company_id')
            ->get(['c.name', 'c.keywords', 'c.country', 'c.web_address', 'c.more_info',
            'c.budged', 'c.type', 'c.category_id', 'c.subcategory_id', 'c.membership']);
    }
}
