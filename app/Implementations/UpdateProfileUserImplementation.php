<?php
namespace App\Implementations;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Interfaces\UpdateProfileUserInterface;
use App\Models\User;
use App\Notifications\NotificationsUpdateUserProfileByAdmin;
use App\Services\ChangeLanguageService;

class UpdateProfileUserImplementation implements UpdateProfileUserInterface
{

    public function updateProfileUser(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $user = User::findOrFail($id);
        $user->update($updateProfileUserRequest->validated());
        if ($user) {
            return response()->json(['message' => __('messages.userU')], 200);
        } else {
            return response()->json(['error' => __('messages.notFound')], 404);
        }
    }
    public function updateProfileUserByAdmin(UpdateProfileUserRequest $updateProfileUserRequest, $id, $languageId)
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        if ($admin) {
            $changeLanguage = new ChangeLanguageService;
            $changeLanguage->changeLanguage($languageId);
            $user = User::findOrFail($id);
            $user->update($updateProfileUserRequest->validated());
            $notification = new NotificationsUpdateUserProfileByAdmin($user);
            $user->notify($notification);

            if ($user) {
                return response()->json(['message' => __('messages.userU')], 200);
            } else {
                return response()->json(['error' => __('messages.notFound')], 404);
            }
        } else {
            return 'Admin not found';
        }

    }
}
