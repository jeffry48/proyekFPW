<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;

class ControllerForm extends Controller
{
    // ini untuk guest
    public function indexBeli(){
        $data_properti = property::all();
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
    public function showLogin()
    {
        return view('login');
    }
    public function showProperti($idProperti)
    {
        $data_properti = property::all()->where('id_properti', $idProperti)->all();
        sort($data_properti);
        return view("detailProperti", ["data_properti" => $data_properti[0]]);
    }
}
