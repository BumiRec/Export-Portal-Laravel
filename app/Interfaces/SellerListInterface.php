<?php
namespace App\Interfaces;

use App\Http\Requests\SellerListRequest;
use App\Models\SellerList;

interface SellerListInterface
{
    public function createInterestedIn(SellerListRequest $sellerListRequest): SellerList;
    public function delete($id, $languageId);

}
