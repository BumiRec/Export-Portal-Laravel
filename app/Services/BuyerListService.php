<?php
namespace App\Services;

use App\Models\BuyerList;

class BuyerListService
{
    public function selectInterstedProduct($id)
    {
        $interestedAt = BuyerList::join('product', 'buyer_list.product_id', 'product.id')
            ->join('users', 'buyer_list.user_id', 'users.id')
            ->where('users.id', $id)
            ->get(['product.id','product.name', 'product.description', 'product.price']);
        return $interestedAt;
    }
}
