<?php

namespace App\Http\Controllers;

use App\BeliModel;
use App\property;
use App\UserBeliModel;
use App\UserKontrakRumah;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BeliController extends Controller
{
    public function beli_rumah(Request $request){
        $id_properti = $request->id_properti;
        $id_user = $request->id_user;
        $check = users::where('id_user',$id_user)->count();
        // if($check>0){
            $properti = property::find($id_properti);
            $harga = $properti->harga_properti;

            // $data = new BeliModel();
            // $data->id_terbeli = "";
            // $data->id_properti = $id_properti;
            // $data->tgl_terbeli = Carbon::today();
            // $data->harga_terbeli = $harga;
            // $data->save();

            $countBeli = UserBeliModel::count();
            $countBeli++;

            if($countBeli < 10){
                $id_beli = "B000" . $countBeli;
            }
            else if($countBeli >= 10 && $countBeli < 100){
                $id_beli = "B00" . $countBeli;
            }
            else{
                $id_beli = "B0" . $countBeli;
            }

            $data = new UserBeliModel();
            $data->id_beli = $id_beli;
            $data->id_user = $id_user;
            $data->id_properti = $id_properti;
            $data->pajak_beli = $harga*(10/100);
            $data->total_beli = $harga+($harga*(10/100));
            $data->pesan_untuk_penjual = $request->pesanPembeli;

            if($request->jenisPembayaran=='kredit'){
                session(['id_beli'=>$id_beli]);
                session(['id_user'=>$id_user]);
                session(['id_properti'=>$id_properti]);
                session(['pajak_beli'=>$harga*(10/100)]);
                session(['harga'=>$harga]);
                session(['total_beli'=>$harga+($harga*(10/100))]);
                return redirect('showCicilan');
            }
            else if($request->jenisPembayaran=='cash'){
                $data->save();

                echo "<script>alert('Berhasil dibeli!')</script>";
                // return redirect('properti_'.$id_properti);
                $data_properti = property::all()->where('id_properti', $id_properti)->all();
                sort($data_properti);
                return view("detailProperti", ["data_properti" => $data_properti[0]]);
            }
        // }
        // else{
        //     echo "<script>alert('Login terlebih dahulu!')</script>";
        //     // return redirect('properti_'.$id_properti);
        //     $request->session()->put('last_activity','beli');
        //     $request->session()->put('id_properti',$id_properti);
        //     return view('login');
        // }
    }

    public function search(Request $request){
        // $rules = [
        //     'search' => 'required'
        // ];
        // $customError = [
        //     'required' => ':attribute harus diisi!'
        // ];
        // $this->validate($request,$rules,$customError);

        $query = $request->search;
        $activity = session('activity');

        if(!empty($query)){
            $result = property::where("kategori_properti",$activity)->where('alamat_properti', 'LIKE', '%'. $query .'%')->get();
        }
        else{
            $result = property::where("kategori_properti",$activity)->get();
        }
        return view("beliRumah", ["data_properti" => $result]);
    }

    public function kontrak_rumah(Request $request){
        $id_properti = $request->id_properti;
        $id_user = $request->id_user;
        $durasi = $request->durasi;

        // $check = users::where('id_user',$id_user)->count();
        // if($check>0){
            $properti = property::find($id_properti);
            $harga = $properti->harga_properti;

            $data = new UserKontrakRumah();
            $data->id_kontrak = "";
            $data->id_user = $id_user;
            $data->id_properti = $id_properti;
            $data->durasi_kontrak = $durasi;
            $data->total_harga = $harga*$durasi;
            $data->save();

            echo "<script>alert('Berhasil disewa!')</script>";
            // return redirect('properti_'.$id_properti);
            $data_properti = property::all()->where('id_properti', $id_properti)->all();
            sort($data_properti);
            return view("detailProperti", ["data_properti" => $data_properti[0]]);
        // }
        // else{
        //     echo "<script>alert('Login terlebih dahulu!')</script>";
        //     // return redirect('properti_'.$id_properti);
        //     $request->session()->put('last_activity','kontrak');
        //     $request->session()->put('id_properti',$id_properti);
        //     return view('login');
        // }
    }
}