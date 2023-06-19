<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Models\UserLanguage;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function createAuth(AuthRequest $authRequest)
{
    $credentials = $authRequest->validated();

    if (Auth::attempt($credentials)) {
        session()->regenerate();

        $user = Auth::user();

        // Retrieve the language ID using the UserLanguage model
        $languageId = UserLanguage::where('user_id', $user->id)->value('language_id');

        $responseData = [
            'message'     => __('messages.welcome'),
            'user'        => $user,
            'language_id' => $languageId,
        ];

        return $responseData;
    }
}
}
