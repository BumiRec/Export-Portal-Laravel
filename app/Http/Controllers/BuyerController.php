<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerRequest;
use App\Http\Requests\SellerListRequest;
use App\Interfaces\BuyerInterface;
use App\Interfaces\SellerListInterface;

class BuyerController extends Controller
{

    private BuyerInterface $buyerInterface;

    public function __construct(BuyerInterface $buyerInterface)
    {
        $this->buyerInterface = $buyerInterface;
    }
    public function buyerConfirmation(BuyerRequest $buyerRequest, BuyerInterface $buyerInterface,
       SellerListInterface $interestedInterface, SellerListRequest $sellerListRequest) {

        $buyer = $this->buyerInterface->createBuyer($buyerRequest);

        $confirm = $buyerRequest->confirmation;
        if ($confirm === true) {

            $interestedInterface->createInterestedIn($sellerListRequest);
        }
        return response()->json(['buyer' => $buyer, $confirm], 201);
    }
}
