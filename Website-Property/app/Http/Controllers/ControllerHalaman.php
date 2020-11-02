<?php

namespace App\Http\Controllers;

use App\Rules\dupeEmail;
use App\Rules\dupeUsername;
use App\Rules\LoginPass;
use App\Rules\LoginUsername;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
// use DB;
use Illuminate\Support\Facades\DB;

class ControllerHalaman extends Controller
{
    function regCheck(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ["required", "max:24"],
            "email" => ["required", "regex:/^.+@.+$/i", "regex:/^.*(?=.*[.]).*$/", new dupeEmail()],
            "phone" => ["required", "regex:/(08)[0-9]{10}/"],
            "username" => ["required", new dupeUsername()],
            "pass" => ["required", "min:8", "max:12", "regex:/[a-z]/", "regex:/[A-Z]/"],
            "repass" => ["required", "same:pass"]
        ], [
            "required" => "Field tidak boleh dikosongi!",
            "name.max" => "Panjang nama tidak boleh lebih dari 24!",
            "email.regex" => "Email tidak sesuai format!",
            "pass.min" => "Password minimal 8 karakter!",
            "pass.max" => "Password maksimal 12 karakter!",
            "pass.regex" => "Password harus terdiri atas huruf besar dan kecil!",
            "repass.same" => "Konfirmasi password salah!"
        ]);
        
        // SELECT `id_user`, `nama_user`, `no_telp_user`, `email_user`, `username_user`, `password_user` FROM `user` WHERE 1
        $count = count(users::where("id_user","like","U%")->get());
        $count += 1;
        $temp = "";
        for ($i=0; $i < 3-($count/10); $i++) { 
            $temp .= "0";
        }
        
        $data = new users;
        $data->id_user = "U".$temp.$count;
        $data->nama_user = $request->input('name');
        $data->no_telp_user = $request->input('phone');
        $data->email_user = $request->input('email');
        $data->username_user = $request->input('username');
        $data->password_user = $request->input('pass');
        $data->save();
        return redirect('/login');
    }

    function login(){
        $loggedin = Cookie::get('loggedin');
        $loggedin = json_decode($loggedin,true);
        return view('components.login',["username"=>$loggedin]);
    }

    function cekLogin(Request $request){
        $username = $request->input('username');
        $validatedData = $request->validate([
            'username' => ['bail','required', new LoginUsername()],
            'pass' => ['required' , new LoginPass($username)]
        ], [
            'required' => 'Field tidak boleh kosong',
        ]);

        $users = users::where([["username_user",$username]])->get();
        Cookie::queue("loggedin", json_encode($username), 360);
        return redirect('/login');
    }

    function logout()
    {
        Cookie::queue(Cookie::forget('loggedin'));
        return redirect('/login');
    }
}
