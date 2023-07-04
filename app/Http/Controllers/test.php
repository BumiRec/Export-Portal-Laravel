<?php

namespace App\Http\Controllers;

use App\Models\User;

class test extends Controller
{
    public function test()
    {

        $users = User::role('admin')->get();
        return $users;
    }
}
