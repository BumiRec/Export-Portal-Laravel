<?php
namespace App\Services;

use App\Models\Product;
use App\Models\ProductCategory;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilterProductService 
{

    public function filterProduct($id)
    {
        $productCategory = ProductCategory::find($id);

        if (!$productCategory) {
            return new JsonResponse(['message' => 'Not found'], 404);
        }

        $productCategory = Product::join('product_category', 'product_category.id', 'product.category_id')
            ->join('company', 'company.id', 'product.company_id')
            ->where('product_category.id', $id)
            ->get(['product.name', 'product.description', 'product.price', 'company.name as company', 'company.country as country']);

        return $productCategory;
    }

    public function filterSubcategory($category_id, $subcategory_id)
    {
        $products = Product::join('product_subcategory', 'product.subcategory_id', '=', 'product_subcategory.id')
            ->join('product_category', 'product_subcategory.category_id', 'product_category.id')
            ->join('company', 'company.id', 'product.company_id')
            ->where('product.category_id', $category_id, )
            ->where('product.subcategory_id', $subcategory_id)
            ->get(['product.name', 'product.description', 'product.price', 'company.name as company', 'company.country as country']);

        return response()->json($products);
    }
}
