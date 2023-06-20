<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function login(AuthRequest $authRequest)
    {
        return response()->json($this->authService->createAuth($authRequest));
    }

    public function logout(Request $request, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => __('messages.logout')], 200);
    }
}
