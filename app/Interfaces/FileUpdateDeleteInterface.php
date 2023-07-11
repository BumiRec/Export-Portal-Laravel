<?php

namespace App\Interfaces;

use App\Http\Requests\FileRequest;

interface FileUpdateDeleteInterface
{
    public function updateFile(FileRequest $request, $id, $languageId);
    public function deleteFile($id, $languageId);
}
