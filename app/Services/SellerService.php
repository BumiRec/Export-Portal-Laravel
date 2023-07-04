<?php
namespace App\Services;

use App\Models\SellerList;

class SellerService
{
    public function showInterestedIn($userId)
    {
        return SellerList::join('product', 'product.id', 'seller_list.product_id')
            ->join('buyer_confirm', 'buyer_confirm.id', 'seller_list.buyer_id')
            ->join('users', 'users.id', 'buyer_confirm.user_id')
            ->join('company', 'company.id', 'product.company_id')
            ->join('user_company', 'company.id', 'user_company.company_id')
            ->where('user_company.user_id', $userId)
            // ->distinct()
            ->get([
                'product.id as product_id',
                'buyer_confirm.id as buyer_id',
                'product.name',
                'product.description',
                'product.price',
                'users.name as user_name',
                'users.surname as user_surname'
            ]);
    }

}