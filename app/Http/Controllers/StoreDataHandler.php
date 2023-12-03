<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\RentList;
use Illuminate\Http\Request;

class StoreDataHandler extends Controller
{
    public function SaveParam()
    {
        $GET_use_ = $_GET['User'] ?? "";
        $GET_IsGoStoreView     = $_GET['IsGoStoreView']       ?? "";

        if((($GET_IsGoStoreView == 1)) && ($GET_use_ != ""))
        {
            $UsersData = User::all();
            if(($UsersData))
            {
                foreach($UsersData as $User)
                {
                    if($User->name == $_GET['User'])
                    {
                        DB::table('rent_lists')->insert([
                            "rent_user_id"  => $User->user_id,
                            "order_name" => $_GET['order_name'],
                            "price" => $_GET['order_price'],
                        ]);
                        break;
                    }
                }
            }
        }
        return view('home');
    }
}
