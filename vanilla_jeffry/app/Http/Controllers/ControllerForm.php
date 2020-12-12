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
use App\UserBeliModel;
use App\users_sell_property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ControllerForm extends Controller
{
    //octa
    public function jualProperty(Request $req)
    {
        $validateData=[
            'jumRuangan'=>['required'],
            'jumKamarMandi'=>['required'],
            'alamat'=>['required'],
            'harga'=>['required'],
        ];
        $customMessage=[
            'required'=>':attribute harus terisi',
        ];
        if($req->jenis=='tanah'&&($req->jumRuangan!=0||$req->jumKamarmandi!=0)){
            session(['pesan'=>'ada']);
            return redirect('jual');
        }
        $this->validate($req, $validateData, $customMessage);

        $data_properti = property::all();
        $countDataPropertiJual = users_sell_property::count();
        $countDataPropertiJual++;

        if($countDataPropertiJual < 10){
            $idJual = "J000" . $countDataPropertiJual;
        }
        else if($countDataPropertiJual >= 10 && $countDataPropertiJual < 100){
            $idJual = "J00" . $countDataPropertiJual;
        }
        else{
            $idJual = "J0" . $countDataPropertiJual;
        }

        $ada = false;
        foreach ($data_properti as $properti){
            if($properti->alamat_properti == $req->alamat){
                // sudah pernah ada di database properti
                $ada = true;
                $insertData = [
                    "id_jual" => $idJual,
                    "id_user" => session('loggedin'),
                    "id_properti" => $properti->id_properti,
                    "preparasi_properti_jual" => $req->preparasi
                ];
                users_sell_property::create($insertData);

                $idCek=$properti->id_properti;
            }
        }

        if($ada){
            $updateProp=property::all()
            ->where('id_properti', $idCek)->all();
            sort($updateProp);

            //Alex just now
            $file = $req->file('foto'); // ngambil foto
            $file->move('properti',$file->getClientOriginalName()); //move ke public/properti
            $namaPic = 'properti/'.$idCek.'.'.$file->getClientOriginalExtension(); //hasil nama
            unlink($updateProp[0]->foto_properti); //hapus file
            rename(public_path('properti/'.$file->getClientOriginalName()), public_path($namaPic));
            //Alex just now

            $updateProp[0]->jenis_properti=$req->jenis;
            $updateProp[0]->kategori_properti=$req->kategori;
            $updateProp[0]->deskripsi_properti=$req->deskripsi;
            $updateProp[0]->jumlah_ruangan_properti=$req->jumRuangan;
            $updateProp[0]->jumlah_kamar_mandi_properti=$req->jumKamarMandi;
            $updateProp[0]->harga_properti=$req->harga;
            $updateProp[0]->tgl_terdaftar_properti=now();
            $updateProp[0]->foto_properti=$namaPic; // ganti ini
            $updateProp[0]->view_properti=0;
            $updateProp[0]->status=1;

            $updateProp[0]->save();

        }

        if(!$ada){
            $countDataProperti = property::count();
            $countDataProperti++;

            if($countDataProperti < 10){
                $idProperti = "P000" . $countDataProperti;
            }
            else if($countDataProperti >= 10 && $countDataProperti < 100){
                $idProperti = "P00" . $countDataProperti;
            }
            else{
                $idProperti = "P0" . $countDataProperti;
            }

            //Alex just now
            $file = $req->file('foto');
            $file->move('properti',$file->getClientOriginalName());
            $namaPic = 'properti/'.$idProperti.'.'.$file->getClientOriginalExtension();
            rename(public_path('properti/'.$file->getClientOriginalName()), public_path($namaPic));
            //Alex just now

            $insertData = [
                "id_properti" => $idProperti,
                "jenis_properti" => $req->jenis,
                "kategori_properti" => $req->kategori,
                "deskripsi_properti" => $req->deskripsi,
                "jumlah_ruangan_properti" => $req->jumRuangan,
                "jumlah_kamar_mandi_properti" => $req->jumKamarMandi,
                "alamat_properti" => $req->alamat,
                "harga_properti" => $req->harga,
                "tgl_terdaftar_properti" => now(),
                //Alex just now
                "foto_properti" => $namaPic,
                //Alex just now
                "view_properti" => 0,
                "status" => 1
            ];

            property::create($insertData);

            $insertData = [
                "id_jual" => $idJual,
                "id_user" => session('loggedin'),
                "id_properti" => $idProperti,
                "preparasi_properti_jual" => $req->preparasi
            ];

            users_sell_property::create($insertData);
        }

        return view("jualRumah");
    }

    // Adrian //////////////////////////////////////////////////////////////////
    public function indexBeli(){
        $data_properti = property::where("kategori_properti","Beli")->where('status', 1)->get();
        session(['activity' => 'Beli']);
        return view("beliRumah", ["data_properti" => $data_properti]);
    }
    public function indexKontrak(){
        $data_properti = property::where("kategori_properti","Kontrak")->where('status', 1)->get();
        session(['activity' => 'Kontrak']);
        return view("beliRumah", ["data_properti" => $data_properti]);
    }
    /////////////////////////////////////////////////////////////////////////////

    //buatan alex:
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

    function cekLogin(Request $request)
    {
        $username = $request->input('username');
        $validatedData = $request->validate([
            'username' => ['bail','required', new LoginUsername()],
            'pass' => ['required' , new LoginPass($username)]
        ], [
            'required' => 'Field tidak boleh kosong',
        ]);

        $users = users::where([["username_user",$username]])->first();
        session(['loggedin' => $users->id_user]);
        return redirect('/');
    }
    public function showProperti($idProperti)
    {
        $data_properti = property::where('id_properti', $idProperti)->first();
        $data_properti->view_properti++;
        $data_properti->save();
        return view("detailProperti", ["data_properti" => $data_properti]);
    }

    public function profile()
    {
        $loggedin = session('loggedin');
        // $loggedin = json_decode(Cookie::get('loggedin'),true);
        $user = users::where('id_user',$loggedin)->first();
        return view('profile',["user"=>$user]);
    }

    function updateprofile(Request $request)
    {
        $validatedData = $request->validate([
            "name" => ["required", "max:24"],
            "email" => ["required", "regex:/^.+@.+$/i", "regex:/^.*(?=.*[.]).*$/", new UpdateProfEmail()],
            "phone" => ["required", "regex:/(08)[0-9]{10}/"],
            "username" => ["required", new UpdateProfUsername()],
            "pass" => ["required", "min:8", "max:12", "regex:/[a-z]/", "regex:/[A-Z]/"],
            "repass" => ["required", new UpdateProfCurPass()]
        ], [
            "required" => "Field :attribute tidak boleh dikosongi!",
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
