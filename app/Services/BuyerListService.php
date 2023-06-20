<?php
namespace App\Services;

use App\Models\BuyerList;

class BuyerListService
{
    public function selectInterstedProduct($id)
    {
        $interestedAt = BuyerList::join('product', 'interested_at.product_id', 'product.id')
            ->join('users', 'interested_at.user_id', 'users.id')
            ->where('users.id', $id)
            ->get(['product.name', 'product.description', 'product.price']);
        return $interestedAt;
    }
}
