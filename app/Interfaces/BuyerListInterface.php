<?php

namespace App\Interfaces;
use App\Http\Requests\BuyerListRequest;
use App\Models\BuyerList;

interface BuyerListInterface{
    public function createInterestedAt(BuyerListRequest $buyerListRequest): BuyerList;

    public function delete($id, $languageId);
}