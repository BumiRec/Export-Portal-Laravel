<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Interfaces\ProductInterface;

class AddProduct extends Controller
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $ProductInterface)
    {
        $this->productInterface = $ProductInterface;
    }
    public function AddProduct(AddProductRequest $addProductRequest, ProductInterface $ProductInterface)
    {
        return response()->json($this->productInterface->createProduct($addProductRequest), 200);

    }
}
