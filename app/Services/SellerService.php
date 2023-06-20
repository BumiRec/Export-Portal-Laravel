<?php
namespace App\Services;

use App\Models\SellerList;

class SellerService 
{
    public function showInterestedIn($id)
    {
        $interested_in = SellerList::join('product', 'product.id', 'interested_in.product_id')
            ->join('buyer_confirm', 'buyer_confirm.id', 'interested_in.buyer_id')
            ->join('company', 'company.id', 'interested_in.company_id')
            ->join('users', 'users.id', 'buyer_confirm.user_id')
            ->where('company.id', $id)
            ->get(['product.id', 'buyer_confirm.id', 'company.id', 'product.name', 'product.description', 'product.price', 'users.name as user_name', 'users.surname as user_surname']);

        return $interested_in;
    }


}
