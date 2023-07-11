<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
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

            /** @var PersonalAccessTokenResult $tokenResult */
            $tokenResult = $user->createToken('auth_token');

            $responseData = [
                'message' => __('messages.welcome'),
                'user'    => $user,
                'token'   => $tokenResult->plainTextToken,
            ];

            return $responseData;
        }
    }
}
