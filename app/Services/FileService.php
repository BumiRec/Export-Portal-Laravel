<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Cache;

class FileService
{

    public function AddFile(FileRequest $request)
    {
        $productId = null;
        $productId = Cache::get('productId');

        if ($productId === null) {
            return response()->json(['error' => 'Product ID is missing'], 400);
        }

        $files = $request->file('files');

        foreach ($files as $key => $file) {
            $typeId        = $request->input('typeId')[$key];
            $filePath      = '';
            $fileExtension = $file->getClientOriginalExtension();
            $filesMimes    = ['jpg', 'png', 'jpeg'];

            if ($typeId == 1 && in_array($fileExtension, $filesMimes)) {
                $filePath = $file->store('Images/cover', 'public');
            } elseif ($typeId == 2 && in_array($fileExtension, $filesMimes)) {
                $filePath = $file->store('Images/slide', 'public');
            } elseif ($typeId == 3 && $fileExtension === 'pdf') {
                $filePath = $file->store('Documents/pdf', 'public');
            } else {
                return response()->json(['error' => __('messages.errorFile')], 400);
            }

            $uploadedFile = FileUpload::create([
                'URL' => $filePath,
            ]);

            FileHasProduct::create([
                'file_id'    => $uploadedFile->id,
                'product_id' => $productId,
            ]);

            FileHasType::create([
                'file_id' => $uploadedFile->id,
                'type_id' => $typeId,
            ]);
        }
        return response()->json(['message' => __('messages.FileUploaded')], 201);
    }

}
