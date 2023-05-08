<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\export_item;
use App\Http\Resources\ViewResource;

class ViewController extends Controller
{
    function view($id)
    {
        $product = Product::find($id);
        $views = $product ? $product->views : null;
        return response()->json(['views' => $views]);
    }

    function date($id)
    {
        $product = Product::find($id);
        $created = $product ? $product->created_at : null;
        return response()->json(['created_at' => $created]);
    }
}
