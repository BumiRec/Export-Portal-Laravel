<?php

namespace App\Implementations;

use App\Events\AssignUserRole;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Interfaces\RegisterInterface;
use App\Models\RolesUser;
use App\Models\Token;
use App\Models\User;
use App\Models\UserLanguage;
use App\Models\NotificationSystem;
use App\Models\UsersToken;
use Spatie\Permission\Models\Role;

class RegisterImplementation implements RegisterInterface
{
    public function userRegister(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest): User
    {
        $user = User::create([
            'name'         => $registerRequest->name,
            'surname'      => $registerRequest->surname,
            'email'        => $registerRequest->email,
            'password'     => bcrypt($registerRequest->password),
            'phone_number' => $registerRequest->phone_number,
            'country_id'   => $registerRequest->country_id,
            'gender'       => $registerRequest->gender,
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

            RolesUser::create([
                'user_id' => $user->id,
                'roles_id'  => 2,
            ]);     

        }

        return $user;
    }
}
