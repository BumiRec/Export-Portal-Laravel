<?php

namespace App\Http\Controllers;

use App\Interfaces\SellerListInterface;
use App\Services\SellerService;
use Illuminate\Support\Facades\App;

class SellerListListController extends Controller
{
    private SellerService $sellerService;
    private SellerListInterface $sellerListInterface;
    public function __construct(SellerService $sellerService, SellerListInterface $sellerListInterface){
        $this->sellerService = $sellerService;
        $this->sellerListInterface = $sellerListInterface;
    }

    public function interestedIn(SellerService $sellerService, $id)
    {
        return response()->json($this->sellerService->showInterestedIn($id), 200);
    }

    public function destroy(SellerListInterface $sellerListInterface, $id, $languageId)
    {
        return response()->json($this->sellerListInterface->delete($id, $languageId), 200);
    }

}
