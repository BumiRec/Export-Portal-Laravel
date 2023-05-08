<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\countries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'phone_number' => 'required|string|max:255|unique:users,phone_number',
                'country_id' => 'required|integer',
                'gender' => 'required|string|max:255',
                'agreementss' => 'required|boolean:true,false',
            ]
        );

        if ($validator->fails()) {
            return response() -> json(['errors' => $validator->errors()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'surname' => $request -> surname,
            'email' => $request -> email,
            'password' => bcrypt($request -> password),
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_id,
            'gender' => $request->gender

        ]);


        return response()->json(['user' => $user], 201);
    }
    public function index()
    {
        return CountryResource::collection(countries::all());
    }
}
