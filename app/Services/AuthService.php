<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\UserLanguage;
use App\Models\NotificationSystem;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createAuth(AuthRequest $authRequest)
    {
        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $user = Auth::user();

            $languageId     = UserLanguage::whereBelongsTo($user)->get('language_id');
            $notificationId = NotificationSystem::where('user_id', $user->id)->value('system');
            $responseData   = [
                'message'        => __('messages.welcome'),
                'user'           => $user,
                'language_id'    => $languageId,
                'notificationId' => $notificationId,
            ];

            return $responseData;
        }
    }
}
