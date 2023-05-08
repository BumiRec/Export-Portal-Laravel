<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_category;
use App\Models\company_subcategory;
use App\Models\product_category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCategory;

class CategoryController extends Controller
{
    function category()
    {
        return CategoryResource::collection(company_category::all());
    }

    function subcategory()
    {
        return CategoryResource::collection(company_subcategory::all());
    }

    function productcategory()
    {
        return ProductCategory::collection(product_category::all());
    }
}
