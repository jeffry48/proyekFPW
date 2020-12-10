<?php

use App\Mail\InsertMail;
use App\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::any('/register', "ControllerForm@showRegister");
Route::post('/cekregister', "ControllerForm@regCheck");
Route::any('/login', "ControllerForm@showLogin");
Route::any('/ceklogin', "ControllerForm@cekLogin");

////////////////////////////////////////////////////////////////////////

Route::get('/beli',"ControllerForm@indexBeli");
Route::get('/kontrak',"ControllerForm@indexKontrak");
Route::get('/jual',"ControllerForm@indexJual");

Route::get('/showCicilan', function () {
    return view('cicilan');
});
Route::post('/insertCicilan', "controllerJeffry@insertCicilan");

Route::get('properti_{id_properti}', "ControllerForm@showProperti");
Route::get('showPembayaranBeli_{id_properti}', "controllerJeffry@showPembayaranBeli");
Route::get('showPembayaranKontrak_{id_properti}', "controllerJeffry@showPembayaranKontrak");

Route::get('beli_rumah','BeliController@beli_rumah');
Route::post('search','BeliController@search');
Route::post('kontrak_rumah','BeliController@kontrak_rumah');

Route::group(['middleware' => 'isLogin' ], function (){
    Route::any('/profile',"ControllerForm@profile");
    Route::any('/logout', "ControllerForm@logout");
    Route::post('/updateprofile',"ControllerForm@updateprofile");
    Route::get('/myProperti', function () {
        return view('myProperty');
    });
    Route::any('/jualProperti', 'ControllerForm@jualProperty');

});
// Route::any('/tes_email', function(){
//     return new InsertMail(Users::first());
// });
