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

Route::get('/', function ()
{
    return view('home');
});
Route::get('/beli',"ControllerForm@indexBeli");
Route::get('/jual',"ControllerForm@indexJual");

Route::get('properti_{id_properti}', "ControllerForm@showProperti");
Route::any('/register', "ControllerForm@showRegister");
Route::any('/login', "ControllerForm@showLogin");
