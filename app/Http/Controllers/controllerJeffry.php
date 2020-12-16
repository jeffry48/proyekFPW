<?php

namespace App\Http\Controllers;

use App\buktiPembelianModel;
use App\buktiPengontrakan;
use App\cicilanModel;
use App\Mail\InsertMail;
use App\Mail\InsertSuksesBeliMail;
use App\Mail\InsertSuksesKontrakMail;
use App\property;
use App\UserBeliModel;
use App\UserKontrakRumah;
use App\users_sell_property;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class controllerJeffry extends Controller
{
    //buatan jeffry:
    public function showPembayaranBeli($idProperti)
    {
        $id_properti =$idProperti;
        $id_user = session('loggedin');
        $checkBuyed=UserBeliModel::all()
        ->where('id_user', $id_user)
        ->where('id_properti', $id_properti)
        ->all();
        if(count($checkBuyed)>0){
            session(['pesan'=>'pembelian sedang diproses']);
            $data_properti = property::all()->where('id_properti', $id_properti)->all();
            sort($data_properti);
            // return view("detailProperti", ["data_properti" => $data_properti[0]]);
            return redirect('properti_'.$data_properti[0]->id_properti);
        }
        else{
            $data_properti = property::all()->where('id_properti', $idProperti)->all();
            sort($data_properti);
            session(['activity' => 'Beli']);
            return view("pembayaranBeli", ["data_properti" => $data_properti[0]]);
        }
    }

    public function showPembayaranKontrak($idProperti)
    {
        $id_properti = $idProperti;
        $id_user = session('loggedin');
        session(['activity' => 'Kontrak']);
        $checkKontrak = UserKontrakRumah::all()
        ->where('id_user', $id_user)
        ->where('id_properti', $id_properti)
        ->all();
        if(count($checkKontrak)>0){
            session(['pesan'=>'kontrak sedang diproses']);
            $data_properti = property::all()->where('id_properti', $id_properti)->all();
            sort($data_properti);
            // return view("detailProperti", ["data_properti" => $data_properti[0]]);
            return redirect('properti_'.$data_properti[0]->id_properti);
        }
        else{
            $data_properti = property::all()->where('id_properti', $idProperti)->all();
            sort($data_properti);
            session(['activity' => 'Kontrak']);
            return view("pembayaranKontrak", ["data_properti" => $data_properti[0]]);
        }
    }

    public function insertCicilan(Request $req)
    {
        $validateData=[
            'durasi'=>['required', 'max:12', 'min: 1', 'numeric', "regex:/[1-12]/"]
        ];
        $customMessage=[
            'required'=>':attribute harus terisi',
            'max'=>':attribute tidak boleh lebih dari 12',
            'min'=>':attribute tidak boleh lebih kecil dari 1',
            'numeric'=>':attribute harus angka',
        ];

        $this->validate($req, $validateData, $customMessage);

        $data = new UserBeliModel();
        $data->id_beli = session('id_beli');
        $data->id_user = session('id_user');
        $data->id_properti = session('id_properti');
        $data->metode_pembelian = session('jenisPembayaran');
        $data->pajak_beli = session('pajak_beli');
        $data->total_beli = session('total_beli')+$req->bungaCicilan;
        $data->tgl_beli = now();
        $data->pesan_untuk_penjual = session('pesanPembeli');

        $data->save();

        $countCicilan = cicilanModel::count();
        $countCicilan++;

        if($countCicilan < 10){
            $idCicil = "C000" . $countCicilan;
        }
        else if($countCicilan >= 10 && $countCicilan < 100){
            $idCicil = "C00" . $countCicilan;
        }
        else{
            $idCicil = "C0" . $countCicilan;
        }

        $dataCicilan=new cicilanModel();

        $dataCicilan->id_cicilan=$idCicil;
        $dataCicilan->id_beli=session('id_beli');
        $dataCicilan->tgl_cicilan_terdaftar=now();
        $dataCicilan->bunga_cicilan=$req->bungaCicilan;
        $dataCicilan->durasi_cicilan=$req->durasi;

        $dataCicilan->save();

        echo "<script>alert('cicilan berhasil didaftarkan!')</script>";

        $data_properti = property::all()->where('id_properti', session('id_properti'))->all();
        sort($data_properti);

        $penjual = users_sell_property::where('id_properti', $data->id_properti)->first();
        $seller = users::where('id_user', $penjual->id_user)->first();
        $buyer = users::where('id_user', $data->id_user)->first();
        $properti = property::where('id_properti', $data->id_properti)->first();

        Mail::to($seller->email_user)->send(new InsertMail($seller, $buyer, $properti, now()));

        return view("detailProperti", ["data_properti" => $data_properti[0]]);
    }

    public function showMyPropertyBeli()
    {
        $propsBeli=property::where('kategori_properti', "beli")->get();
        $myProp=users_sell_property::all()
        ->where('id_user', session('loggedin'))->all();
        sort($myProp);

        $all=[];

        for ($i=0; $i < count($myProp); $i++) {
            for ($j=0; $j < count($propsBeli); $j++) {
                if($myProp[$i]->id_properti==$propsBeli[$j]->id_properti){
                    array_push($all, $myProp[$i]);
                }
            }
        }

        sort($all);

        return view('myProperty', ['data_properti'=>$all]);
    }

    public function showmyPropertiDetail($idProperti)
    {
        $data_properti = property::where('id_properti', $idProperti)->first();
        session(['seller'=>'true']);
        return view("detailProperti", ["data_properti" => $data_properti]);
    }

    public function prosesBeli(Request $req)
    {
        $dataBeli=UserBeliModel::find($req->idBeli);

        $data=new buktiPembelianModel();

        $countPembelian = buktiPembelianModel::count();
        $countPembelian++;

        if($countPembelian < 10){
            $idPembelian = "TB000" . $countPembelian;
        }
        else if($countPembelian >= 10 && $countPembelian < 100){
            $idPembelian = "TB00" . $countPembelian;
        }
        else{
            $idPembelian = "TB0" . $countPembelian;
        }

        $data->id_terbeli=$idPembelian;
        $data->id_beli=$dataBeli->id_beli;
        $data->tgl_terbeli=now();
        $data->harga_terbeli=$dataBeli->total_beli;

        $data->save();

        $dataProperti=property::find($req->idProperti);
        $dataProperti->status=0;
        $dataProperti->save();

        // tambahkan email ke pembeli
        $data_beli = UserBeliModel::where('id_beli', $data->id_beli)->first();
        $penjual = users_sell_property::where('id_properti', $data_beli->id_properti)->first();
        $seller = users::where('id_user', $penjual->id_user)->first();
        $buyer = users::where('id_user', $data_beli->id_user)->first();
        $properti = property::where('id_properti', $data_beli->id_properti)->first();

        Mail::to($buyer->email_user)->send(new InsertSuksesBeliMail($seller, $buyer, $properti, now()));

        return redirect('myPropertiBeli');

    }

    public function filterMyProp(Request $req)
    {
        if($req->filter=='jual'){
            return redirect('myPropertiBeli');
        }
        else if($req->filter=='kontrak'){
            return redirect('myPropertiKontrak');
        }
    }

    public function showMyPropertyKontrak()
    {
        $propsBeli=property::where('kategori_properti', "kontrak")->get();
        $myProp=users_sell_property::all()
        ->where('id_user', session('loggedin'))->all();
        sort($myProp);

        $all=[];

        for ($i=0; $i < count($myProp); $i++) {
            for ($j=0; $j < count($propsBeli); $j++) {
                if($myProp[$i]->id_properti==$propsBeli[$j]->id_properti){
                    array_push($all, $myProp[$i]);
                }
            }
        }

        sort($all);
        return view('myProperty', ['data_properti'=>$all]);
    }
    public function prosesKontrak(Request $req)
    {
        $dataKontrak=UserKontrakRumah::find($req->idKontrak);

        $data=new buktiPengontrakan();

        $countTerkontrak = buktiPengontrakan::count();
        $countTerkontrak++;

        if($countTerkontrak < 10){
            $idTerkontrak = "TK000" . $countTerkontrak;
        }
        else if($countTerkontrak >= 10 && $countTerkontrak < 100){
            $idTerkontrak = "TK00" . $countTerkontrak;
        }
        else{
            $idTerkontrak = "TK0" . $countTerkontrak;
        }

        $data->id_terkontrak=$idTerkontrak;
        $data->id_kontrak=$dataKontrak->id_kontrak;
        $data->total_harga_kontrak=$dataKontrak->harga;

        $data->save();

        $dataProperti=property::find($req->idProperti);
        $dataProperti->status=0;
        $dataProperti->save();

        $data_kontrak = UserKontrakRumah::where('id_kontrak', $data->id_kontrak)->first();
        $penjual = users_sell_property::where('id_properti', $data_kontrak->id_properti)->first();
        $seller = users::where('id_user', $penjual->id_user)->first();
        $buyer = users::where('id_user', $data_kontrak->id_user)->first();
        $properti = property::where('id_properti', $data_kontrak->id_properti)->first();

        Mail::to($seller->email_user)->send(new InsertSuksesKontrakMail($seller, $buyer, $properti, now(), $data->tgl_awal, $data->durasi_kontrak, $data->tgl_akhir));

        return redirect('myPropertiBeli');

    }
}
