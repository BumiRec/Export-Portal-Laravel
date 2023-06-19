<?php
namespace App\Services;
use App\Models\Product;

class ProductService{

    public function productList(){

        $product = Product::join('product_category as pc', 'product.category_id', 'pc.id')
        ->join('product_subcategory as ps', 'product.subcategory_id', 'ps.id')
        ->join('company as c', 'product.company_id', 'c.id')
        ->select(['product.name', 'product.description', 'product.price', 'product.type',
        'pc.name as category', 'ps.name as subcategory', 'c.name as company'])
        ->paginate(10);

        $numPages = $product->lastPage();
        return [
            'numPages' => $numPages,
            'exportProducts' => $product,
        ];
    }
}
