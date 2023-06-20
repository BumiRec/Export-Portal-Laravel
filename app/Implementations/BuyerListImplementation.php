<?php
namespace App\Implementations;

use App\Http\Requests\BuyerListRequest;
use App\Interfaces\BuyerListInterface;
use App\Models\BuyerList;

class BuyerListImplementation implements BuyerListInterface
{
    public function createInterestedAt(BuyerListRequest $buyerListRequest): BuyerList
    {
        return BuyerList::create(
            [
                'product_id' => $buyerListRequest['product_id'],
                'user_id'    => $buyerListRequest['user_id'],
                'company_id' => $buyerListRequest['company_id'],

            ]
        );

    }
    public function delete($id, $languageId)
    {
        $product = BuyerList::findOrFail($id);
        $product->delete();
        return __('messages.delete');

    }
}
