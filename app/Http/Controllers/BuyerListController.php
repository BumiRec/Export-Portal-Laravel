<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyerListRequest;
use App\Interfaces\BuyerListInterface;
use App\Services\BuyerListService;

class BuyerListController extends Controller
{
    private BuyerListInterface $buyerListInterface;
    private BuyerListService $buyerListService;
    public function __construct(BuyerListInterface $buyerListInterface, BuyerListService $buyerListService)
    {
        $this->buyerListInterface = $buyerListInterface;
        $this->buyerListService   = $buyerListService;
    }

    public function interestedAt(BuyerListInterface $buyerListInterface, BuyerListRequest $buyerListRequest)
    {
        return response()->json($this->buyerListInterface->createInterestedAt($buyerListRequest), 200);

    }

    public function interestedProduct(BuyerListService $buyerListService, $id)
    {
        return response()->json($this->buyerListService->selectInterstedProduct($id), 200);
    }

    public function deleteInterestedAT(BuyerListInterface $buyerListInterface, $id, $languageId)
    {
        return response()->json($this->buyerListInterface->delete($id, $languageId), 200);
    }
}
