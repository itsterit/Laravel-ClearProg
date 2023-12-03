<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ShowLoginForm()
    {
        return view("auth.login");
    }

    public function ShowRegForm()
    {
        return view("auth.register");
    }

    public function Reg_act(Request  $request)
    {
        $new_user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $request["password"],
        ]);
    }
}
