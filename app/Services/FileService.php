<?php

namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;

class FileService
{
    public function AddFile(FileRequest $request)
    {
        $storedData = $request->session()->get('stored_data');

        if (!$storedData) {
            return response()->json(['error' => __('messages.noStoredData')], 400);
        }

        $productId = $this->processData($storedData)['id'];

        $files = $request->file('files');

        foreach ($files as $key => $file) {
            $typeId        = $request->input('typeId')[$key];
            $filePath      = '';
            $fileExtension = $file->getClientOriginalExtension();
            $imgMimes      = ['jpg', 'png', 'jpeg'];

            if ($typeId == 1 && in_array($fileExtension, $imgMimes)) {
                $filePath = $file->store('Images/cover', 'public');
            } elseif ($typeId == 2 && in_array($fileExtension, $imgMimes)) {
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
    private function processData($data)
    {
        $processedData = $data;

        return $processedData;
    }

}
