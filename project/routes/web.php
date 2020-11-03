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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/home', 'ControllerForm@home');

Route::get('/register', function(){
    return view('components.register');
});
Route::post('/regCheck', "ControllerHalaman@regCheck");
Route::any('/login', "ControllerHalaman@login");
Route::any('/logout', "ControllerHalaman@logout");
Route::post('/cekLogin', "ControllerHalaman@cekLogin");
