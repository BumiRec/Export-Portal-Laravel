<?php

namespace App\Implementations;

use App\Http\Requests\AddProductRequest;
use App\Interfaces\ProductInterface;
use App\Models\ExportProduct;
use App\Models\ImportProduct;
use App\Models\Product;

class ProductImplementation implements ProductInterface
{

    public function createProduct(AddProductRequest $addProductRequest): Product
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            throw new \Exception ('User must be logged in to add a product.');
        }

        // Retrieve the authenticated user
        $user    = Auth::user();
        $product = Product::create(
            [
                'name'           => $addProductRequest['name'],
                'description'    => $addProductRequest['description'],
                'price'          => $addProductRequest['price'],
                'type'           => $addProductRequest['type'],
                'views'          => $addProductRequest['views'],
                'category_id'    => $addProductRequest['category_id'],
                'subcategory_id' => $addProductRequest['subcategory_id'],
                'company_id'     => $addProductRequest['company_id'],
            ]
        );

        $typeImportExport = $addProductRequest->type;

        $productId = $product->id;

        if ($typeImportExport == 'export') {
            $this->createExportProduct($productId);
        }
        if ($typeImportExport == 'import') {
            $this->createImportProduct($productId);
        }

        $data = $product;

        $addProductRequest->session()->put('stored_data', $data);

        return $product;
    }
    public function createExportProduct($id): ExportProduct
    {
        return ExportProduct::create([
            'product_id' => $id,
        ]);
    }
    public function createImportProduct($id): ImportProduct
    {
        return ImportProduct::create([
            'product_id' => $id,
        ]);
    }
}
