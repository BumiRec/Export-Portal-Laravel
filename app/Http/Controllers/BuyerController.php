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
    public function buyerConfirmation(BuyerRequest $buyerRequest, BuyerInterface $buyerInterface) {

        $buyer = $this->buyerInterface->createBuyer($buyerRequest);

        // $confirm = $buyerRequest->confirmation;
       
        return response()->json(['buyer' => $buyer], 201);
    }
}
