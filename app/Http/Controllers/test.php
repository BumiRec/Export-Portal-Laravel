<?php

namespace App\Http\Controllers;

use App\Models\User;

class test extends Controller
{
    public function test()
    {

        $users = User::role('user')->get();
        return $users;
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class test extends Controller
// {
//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();

//             return response()->json(['message' => 'Authenticated']);
//         }

//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }

//     public function logout(Request $request)
//     {
//         Auth::logout();
//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return response()->json(['message' => 'Logged out']);
//     }
// }
