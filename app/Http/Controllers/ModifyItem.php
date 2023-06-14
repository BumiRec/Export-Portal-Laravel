<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyItemRequest;
use App\Interfaces\ModifyItemInterface;
use Illuminate\Support\Facades\App;

class ModifyItem extends Controller
{
    private ModifyItemInterface $modifyItemInterface;

    public function __construct(ModifyItemInterface $modifyItemInterface)
    {
        $this->modifyItemInterface = $modifyItemInterface;
    }
    public function update(ModifyItemInterface $modifyItemInterface, ModifyItemRequest $modifyItemRequest, $id)
    {
        return response()->json($this->modifyItemInterface->modifyProduct($modifyItemRequest, $id), 200);
    }

    public function destroy(ModifyItemInterface $modifyItemInterface, $id, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->modifyItemInterface->deleteProduct($id, $language), 200);
    }
}
