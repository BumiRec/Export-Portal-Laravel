<?php

namespace App\Http\Controllers;

use App\Models\User;

class test extends Controller
{
    public function test()
    {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return $users;
    }
}
