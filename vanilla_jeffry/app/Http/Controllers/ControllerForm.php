<?php

namespace App\Http\Controllers;

use App\users;
use App\property;
use App\Rules\dupeEmail;
use App\Rules\dupeUsername;
use App\Rules\LoginPass;
use App\Rules\LoginUsername;
use App\Rules\UpdateProfCurPass;
use App\Rules\UpdateProfEmail;
use App\Rules\UpdateProfUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ControllerForm extends Controller
{
    // ini untuk guest
    public function indexBeli(){
        $data_properti = property::where("kategori_properti","Beli")->get();
        return view("beliRumah", ["data_properti" => $data_properti]);
    }
    public function indexKontrak(){
        $data_properti = property::where("kategori_properti","Kontrak")->get();
        return view("beliRumah", ["data_properti" => $data_properti]);
    }
    public function indexJual()
    {
        return view('jualRumah');
    }
    public function showRegister()
    {
        return view('register');
    }
    
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
        for ($i=0; $i < 4-(int)pow($count,1/10); $i++) { 
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

    public function showLogin()
    {
        return view('login');
    }
    
    function cekLogin(Request $request){
        $username = $request->input('username');
        $validatedData = $request->validate([
            'username' => ['bail','required', new LoginUsername()],
            'pass' => ['required' , new LoginPass($username)]
        ], [
            'required' => 'Field tidak boleh kosong',
        ]);

        $users = users::where([["username_user",$username]])->first();
        // Cookie::queue("loggedin", json_encode($users->id_user), 360);
        session(['loggedin' => $users->id_user]);
        return redirect('/');
    }
    public function showProperti($idProperti)
    {
        $data_properti = property::where('id_properti', $idProperti)->first();
        return view("detailProperti", ["data_properti" => $data_properti]);
    }
    
    public function profile()
    {
        $loggedin = session('loggedin');
        // $loggedin = json_decode(Cookie::get('loggedin'),true);
        $user = users::where('id_user',$loggedin)->first();
        return view('profile',["user"=>$user]);
    }
    
    function updateprofile(Request $request){
        $validatedData = $request->validate([
            "name" => ["required", "max:24"],
            "email" => ["required", "regex:/^.+@.+$/i", "regex:/^.*(?=.*[.]).*$/", new UpdateProfEmail()],
            "phone" => ["required", "regex:/(08)[0-9]{10}/"],
            "username" => ["required", new UpdateProfUsername()],
            "pass" => ["required", "min:8", "max:12", "regex:/[a-z]/", "regex:/[A-Z]/"],
            "repass" => ["required", new UpdateProfCurPass()]
        ], [
            "required" => "Field tidak boleh dikosongi!",
            "name.max" => "Panjang nama tidak boleh lebih dari 24!",
            "email.regex" => "Email tidak sesuai format!",
            "pass.min" => "Password minimal 8 karakter!",
            "pass.max" => "Password maksimal 12 karakter!",
            "pass.regex" => "Password harus terdiri atas huruf besar dan kecil!"
        ]);

        // $users = users::where([["username_user",$username]])->get();
        
        $loggedin = session('loggedin');
        users::where('id_user',$loggedin)->update([
            'nama_user' => $request->input('name'),
            'no_telp_user'=>$request->input('phone'),
            'email_user'=>$request->input('email'),
            'username_user'=>$request->input('username'),
            'password_user'=>$request->input('pass')
        ]);
        return redirect('/profile');
    }
    function logout(Request $request)
    {
        $request->session()->forget('loggedin');
        // $loggedin = session('loggedin');
        // Cookie::queue(Cookie::forget('loggedin'));
        return redirect('/');
    }
}
