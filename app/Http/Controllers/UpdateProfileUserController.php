<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;

class UpdateProfileUserController extends Controller
{
    private UpdateProfileUserInterface $updateProfileUserInterface;

    public function __construct(UpdateProfileUserInterface $updateProfileUserInterface)
    {
        $this->updateProfileUserInterface = $updateProfileUserInterface;
    }
    public function updateUser(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId)
    {
        return response()->json($this->updateProfileUserInterface
                ->updateProfileUser($updateProfileUserRequest, $id, $languageId));
    }
    public function updateUserByAdmin(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId)
    {
        return response()->json($this->updateProfileUserInterface
                ->updateProfileUserByAdmin($updateProfileUserRequest, $id, $languageId));
    }
}
