<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\CategoryStatusInterface;
use App\Http\Requests\CategoryStatusRequest;

class CategoryStatusController extends Controller
{
    private CategoryStatusInterface $categoryStatusInterface;
    public function __construct(CategoryStatusInterface $categoryStatusInterface)
    {
        $this->categoryStatusInterface = $categoryStatusInterface;
    }

    public function categoryUpdated(CategoryStatusRequest $categoryStatusRequest, $companyId)
    {
        return response()->json($this->categoryStatusInterface->updateCategory($categoryStatusRequest, $companyId));
    }

    public function statusUpdated(CategoryStatusRequest $categoryStatusRequest, $companyId){
        return response()->json($this->categoryStatusInterface->updateStatus($categoryStatusRequest, $companyId));
    }
}