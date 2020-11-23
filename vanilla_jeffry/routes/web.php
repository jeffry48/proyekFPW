<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// EXPLORE WITHOUT USER LOGIN
Route::get('/', function ()
{
    return view('home');
});
Route::get('/beli',"ControllerForm@indexBeli");
Route::get('/kontrak',"ControllerForm@indexKontrak");
Route::get('/jual',"ControllerForm@indexJual");
Route::get('properti_{id_properti}', "ControllerForm@showProperti");

Route::any('/register', "ControllerForm@showRegister");
Route::any('/login', "ControllerForm@showLogin");
Route::post('/cekregister', "ControllerForm@regCheck");
Route::any('/ceklogin', "ControllerForm@cekLogin");

// MUST LOGIN FIRST
Route::group(['middleware' => 'isLogin' ], function (){
    Route::any('/profile',"ControllerForm@profile")->middleware('isLogin');
    Route::any('/logout', "ControllerForm@logout");
    Route::post('/updateprofile',"ControllerForm@updateprofile");

    Route::any('/jualProperti', 'ControllerForm@jualProperty');
});
