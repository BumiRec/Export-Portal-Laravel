<?php
namespace App\Interfaces;

use App\Http\Requests\AddProductRequest;
use App\Models\ExportProduct;
use App\Models\ImportProduct;

interface ProductInterface
{

    public function createProduct(AddProductRequest $addProductRequest);
    public function createExportProduct(AddProductRequest $addProductRequest): ExportProduct;
    public function createImportProduct(AddProductRequest $addProductRequest): ImportProduct;

}
