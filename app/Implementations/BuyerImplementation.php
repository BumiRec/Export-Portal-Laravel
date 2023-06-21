<?php
namespace App\Implementations;

use App\Http\Requests\BuyerRequest;
use App\Interfaces\BuyerInterface;
use App\Models\BuyerConfirmation;
use App\Models\SellerList;


class BuyerImplementation implements BuyerInterface
{

    public function createBuyer(BuyerRequest $buyerRequest): BuyerConfirmation
    {
        $buyerConfirmation = BuyerConfirmation::create(
            [
                'user_id' => $buyerRequest['user_id'],
                'product_id' => $buyerRequest['product_id'],
                'confirmation' => $buyerRequest['confirmation'],
            ]
        );

        if ($buyerConfirmation->confirmation == true){
           $x = SellerList::create([
                'product_id' => $buyerRequest -> product_id,
                'buyer_id' => $buyerConfirmation -> id
              
            ] );
        }  
           return $buyerConfirmation;
    }
}