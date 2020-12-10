<?php

namespace App\Http\Controllers;

use App\cicilanModel;
use App\property;
use App\UserBeliModel;
use App\UserKontrakRumah;
use Illuminate\Http\Request;

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
        $data = new UserBeliModel();

        $data->id_beli = session('id_beli');
        $data->id_user = session('id_user');
        $data->id_properti = session('id_properti');
        $data->pajak_beli = session('pajak_beli');
        $data->total_beli = session('total_beli')+$req->bungaCicilan;

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

        echo "<script>alert(' cicilan Berhasil didaftarkan!')</script>";

        $data_properti = property::all()->where('id_properti', session('id_properti'))->all();
        sort($data_properti);
        return view("detailProperti", ["data_properti" => $data_properti[0]]);
    }
}
