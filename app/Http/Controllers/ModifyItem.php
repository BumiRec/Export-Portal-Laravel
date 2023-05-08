<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ModifyItem extends Controller
{
    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);
        $productValidated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'imageURL' => 'required|string|max:255',
            // 'image' => 'required|image'
        ]);

        $product->name = $productValidated['name'];
        $product->description = $productValidated['description'];
        $product->price = $productValidated['price'];
        $product->imageURL = $productValidated['imageURL'];
        $product->save();

        return response()->json(['product' => $product]);
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product -> delete();
        return response()->json("Product deleted");
    }
}
