<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersTokenRequest;
use App\Http\Resources\CountryResource;
use App\Interfaces\RegisterInterface;
use App\Models\Countries;
use App\Models\Prefix;

class RegisterController extends Controller
{
    private RegisterInterface $registerInterface;
    public function __construct(RegisterInterface $registerInterface)
    {
        $this->registerInterface = $registerInterface;
    }
    public function register(RegisterInterface $registerInterface, RegisterRequest $registerRequest, UsersTokenRequest $usersTokenRequest)
    {
        return response()->json($this->registerInterface->userRegister($registerRequest, $usersTokenRequest), 201);
    }
    public function index()
    {
        return CountryResource::collection(Countries::all());
    }

    public function prefixes(RegisterInterface $registerInterface)
    {
        return response()->json($this->registerInterface->showPrefixes());
    }

}
