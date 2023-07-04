<?php
namespace App\Interfaces;

use App\Http\Requests\UpdateProfileUserRequest;

interface UpdateProfileUserInterface
{

    public function updateProfileUser(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId);
    public function updateProfileUserByAdmin(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId);
}
