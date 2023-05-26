<?php
namespace App\Services\Services;

use App\Http\Requests\AuthRequest;
use App\Services\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthInterface
{
    public function createAuth(AuthRequest $authRequest)
    {

        $credentials = $authRequest->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $user = [
                'message' => 'Welcome new user',
                'user'    => Auth::user(),
            ];

            return $user;
        }

        $message = "The provided credentials are incorrect";

        return response()->json(['error' => $message], 401);
    }

}
