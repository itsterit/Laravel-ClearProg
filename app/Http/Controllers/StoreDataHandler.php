<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreDataHandler extends Controller
{
    public function SaveParam()
    {
        $GET_use_id = $_GET['User'] ?? "";
        return view('home');
    }
}
