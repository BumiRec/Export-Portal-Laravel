<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            // $request->session()->regenerate();

            return response()->json(['message' => 'Welcome new user']);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout()
    {
        auth()->logout(); //logout the currently authenticated user

        session()->invalidate(); //invalidate the session

        session()->regenerateToken(); //regenerate token

        return response()->json(['success' => 'Logged out'], 200);
    }
}
