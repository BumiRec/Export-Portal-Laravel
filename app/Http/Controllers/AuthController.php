<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            // $request->session()->regenerate();

            return response()->json([
                'message' => 'Welcome new user',
                'user'    => Auth::user(),
            ], 200);
        }

        return response()->json([
            'message' => 'The provided credentials are incorrect'
        ], 401);

        // return ValidationException::withMessages([
        //     'email' => ['The provided credentials are incorrect.'],
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
