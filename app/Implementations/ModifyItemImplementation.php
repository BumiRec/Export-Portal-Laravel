<?php
namespace App\Implementations;

use App\Http\Requests\ModifyItemRequest;
use App\Interfaces\ModifyItemInterface;
use App\Models\Product;
use App\Services\ChangeLanguageService;

class ModifyItemImplementation implements ModifyItemInterface
{

    public function modifyProduct(ModifyItemRequest $modifyItemRequest, $id)
    {
        $product = Product::findOrFail($id);

        $product->name        = $modifyItemRequest['name'];
        $product->description = $modifyItemRequest['description'];
        $product->price       = $modifyItemRequest['price'];
        $product->save();

        return $product;
    }

    public function deleteProduct($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(__('messages.delete'));
    }

}
