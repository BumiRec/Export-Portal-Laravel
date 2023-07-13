<?php

namespace App\Implementations;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Interfaces\RegisterInterface;
use App\Models\NotificationSystem;
use App\Models\Prefix;
use App\Models\Token;
use App\Models\User;
use App\Models\UserLanguage;
use App\Models\UsersToken;

class RegisterImplementation implements RegisterInterface
{
    public function userRegister(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest): User
    {
        $user = User::create([
            'name'      => $registerRequest->name,
            'email'     => $registerRequest->email,
            'password'  => bcrypt($registerRequest->password),
            'prefix_id' => $registerRequest->phone_number,
            'type'      => $registerRequest->type,
        ]);

        if ($user) {
            $token = Token::create([
                'amount' => 100,
            ]);

            UsersToken::create([
                'user_id'  => $user->id,
                'token_id' => $token->id,
            ]);

            UserLanguage::create([
                'user_id'     => $user->id,
                'language_id' => 1,
            ]);

            NotificationSystem::create([
                'user_id' => $user->id,
                'system'  => 1,
            ]);

            // RolesUser::create([
            //     'user_id' => $user->id,
            //     'roles_id'  => 2,
            // ]);

            // User::find($user->id);
            // $user->assignRole(1);

        }

        return $user;
    }

    public function showPrefixes():Prefix
    {
        return Prefix::get(['prefix', 'country']);
    }
}
