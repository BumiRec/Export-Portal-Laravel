<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_category;

class FilterController extends Controller
{
    function filterProduct($id){
        $productCategory = Product_category::find($id);

        if(!$productCategory){
            return new JsonResponse(['message'=>'Not found'], 404);
        }
        
        $product = Product::select('product.name', 'product.description', 'product.price', 'product.imageURL', 'company.name as company', 'company.country as country')
            ->join('product_category', 'product_category.id', '=', 'product.category_id')
            ->join('company', 'company.id', '=', 'product.company_id')
            ->where('product_category.id', $id)
            ->get();

        return $product;    
    }
}
