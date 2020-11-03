<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\users;

class ControllerForm extends Controller
{
    // ini untuk 2 2nya udah
    public function home(){
        //loggedin = username
        $loggedin = Cookie::get('loggedin');
        $loggedin = json_decode($loggedin,true);
        $user_login = users::where("username_user",$loggedin)->get();
        $data_properti = property::all();
        if($loggedin == null){
            return view("components.home", ["data_properti" => $data_properti]);
        }else{
            return view("components.home", ["data_properti" => $data_properti, "user_login" => $user_login[0]["nama_user"]]);
        }
    }

}
