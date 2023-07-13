<?php
namespace App\Interfaces;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Models\Prefix;
use App\Models\User;

interface RegisterInterface
{

    public function userRegister(RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest):User;

    public function showPrefixes():Prefix;
}
