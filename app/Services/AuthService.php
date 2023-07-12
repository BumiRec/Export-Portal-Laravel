<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\NotificationSystem;
use App\Models\UserLanguage;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessTokenResult;

class AuthService
{
    public function createAuth(AuthRequest $authRequest)
    {
        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $user = Auth::user();

            $langaugeId     = UserLanguage::whereBelongsTo($user)->get('language_id');
            $notificationId = NotificationSystem::where('user_id', $user->id)->value('system');

            $tokenResult = $user->createToken('auth_token');

            $responseData = [
                'message' => __('messages.welcome'),
                'user'    => $user,
                'token'   => $tokenResult->plainTextToken,
                'language_id'    => $langaugeId,
                'notificationId' => $notificationId,
            ];

            return $responseData;
        }
    }
}