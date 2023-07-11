<?php
namespace App\Implementations;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
use App\Services\ChangeLanguageService;
use Illuminate\Support\Facades\File;

class FileUpdateDeleteImplementation implements FileUpdateDeleteInterface
{

    public function updateFile(FileRequest $request, $id, $languageId)
    {
        $fileData       = FileUpload::find($id);
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        if (!$fileData) {
            return response()->json(['message' => __('messages.fileUpdate')], 404);
        }

        $existingFilePath = public_path('storage/' . $fileData->URL);
        File::delete($existingFilePath);

        $typeId    = $request->typeId;
        $filePaths = [];
        $files     = $request->file('files');

        if ($request->hasFile('files')) {
            $imgMimes = ['jpg', 'png', 'jpeg'];

            foreach ($files as $file) {
                if ($file->isValid()) {
                    $fileExtension = $file->getClientOriginalExtension();

                    if ($typeId == 1 && in_array($fileExtension, $imgMimes)) {
                        $filePath = $file->store('Images/cover', 'public');
                    } elseif ($typeId == 2 && in_array($fileExtension, $imgMimes)) {
                        $filePath = $file->store('Images/slide', 'public');
                    } elseif ($typeId == 3 && $fileExtension === 'pdf') {
                        $filePath = $file->store('Documents/pdf', 'public');
                    } else {
                        return response()->json(['error' => __('messages.errorFile')], 400);
                    }

                    $filePaths[] = $filePath;
                } else {
                    return response()->json(['error' => __('messages.invalidFile')], 400);
                }
            }
        } else {
            return response()->json(['error' => __('messages.noFiles')], 400);
        }

        $fileData->URL = $filePath;
        $fileData->save();

        return response()->json(['message' => __('messages.fileUpdateS')]);
    }
    public function deleteFile($id, $languageId)
    {
        $file           = FileUpload::find($id);
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        if (!$file) {
            return response()->json(['message' => __('messages.notFound')], 404);
        }

        $filePath = public_path('storage/' . $file->URL);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        FileHasProduct::where('file_id', $file->id)->delete();

        FileHasType::where('file_id', $file->id)->delete();

        $file->delete();

        return __('messages.deleted');
    }
}
