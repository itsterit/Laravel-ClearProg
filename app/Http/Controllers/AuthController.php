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
            "user_id" => 1,
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $request["password"],
        ]);

        if($new_user)
        {
            $User_name = $request["name"];
            auth("web")->login($new_user);
        }

        session(['UserName' => $request["name"]]);
        return redirect('/home');
    }

    public function EndSession()
    {
        session()->flush();
        return view("home");
    }

    public function Log_act(Request  $request)
    {
        $email = $request["email"];
        $password = $request["password"];
        $UsersData = User::all();

        if(($UsersData))
        {
            foreach($UsersData as $User)
            {
                if(($User->email == $email) && ($User->password == $password))
                {
                    session()->flush();
                    session(['UserName' => $User->name]);
                    return redirect('/home');
                }
            }
        }
        return redirect('/login');
    }
}
