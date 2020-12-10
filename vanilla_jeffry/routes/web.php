<?php

<<<<<<< Updated upstream
use Illuminate\Support\Facades\Route;
=======
use App\Mail\InsertMail;
use App\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
// EXPLORE WITHOUT USER LOGIN
=======
>>>>>>> Stashed changes
Route::get('/', function ()
{
    return view('home');
});
<<<<<<< Updated upstream
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
=======
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
>>>>>>> Stashed changes
