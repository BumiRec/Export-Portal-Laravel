<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\import_product;
use App\Http\Resources\ImportResource;

class ImportPoduct extends Controller
{
    function import()
    {
        $importProducts = DB::table('import_product as imp')
        ->join('product as p', 'imp.product_id', '=', 'p.id')
        ->join('company as c', 'c.id', '=', 'p.company_id')
        ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
        ->select('p.name', 'p.description', 'p.price', 'p.imageURL', 'p.views', 'c.name as company_name', 'c.country', 'c.keywords', 'pc.name as category_name')
        ->get();

        $array = $importProducts->map(function ($obj) {
            return (array)$obj;
        })->toArray();

         return ImportResource::collection($array);
    }

    function show($id)
    {
        $importProducts = DB::table('import_product as imp')
           ->join('product as p', 'imp.product_id', '=', 'p.id')
           ->join('company as c', 'c.id', '=', 'p.company_id')
           ->join('product_category as pc', 'pc.id', '=', 'p.category_id')
           ->where('imp.id', '=', $id)
           ->select('p.name', 'p.description', 'p.price', 'p.imageURL', 'p.views', 'c.name as company_name', 'c.country', 'c.keywords', 'pc.name as category_name')
           ->get();
            $array = $importProducts->map(function ($obj) {
                return (array)$obj;
            })->toArray();

           return ImportResource::collection($array);
    }
}
