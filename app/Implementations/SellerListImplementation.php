<?php
namespace App\Implementations;

use App\Http\Requests\SellerListRequest;
use App\Interfaces\SellerListInterface;
use App\Models\SellerList;

class SellerListImplementation implements SellerListInterface
{
    public function createInterestedIn(SellerListRequest $sellerListRequest): SellerList
    {

        return SellerList::create(
            [
                'buyer_id'   => $sellerListRequest['buyer_id'],
                'product_id' => $sellerListRequest['product_id'],
            ]
        );

    }

    public function delete($id, $languageId)
    {
        $product = SellerList::findOrFail($id);
        $product->delete();
        return __('messages.delete');
    }
}
