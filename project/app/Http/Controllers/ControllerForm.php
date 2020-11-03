<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;

class ControllerForm extends Controller
{
    // ini untuk guest
    public function index(){
        $data_properti = property::all();
        return view("home", ["data_properti" => $data_properti]);
    }
}
