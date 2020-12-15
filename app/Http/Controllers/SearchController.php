<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;
use PDO;

class SearchController extends Controller
{
    function search(Request $request){
        // $rumah = $request->cookie('rumah');
        // $tanah = $request->cookie('tanah');
        // $apartemen = $request->cookie('apartemen');
        $rumah = $request->rumah;
        $tanah = $request->tanah;
        $apartemen = $request->apartemen;
        $query = $request->search;
        // $ruangan = $request->input('ruangan',0);
        // $kamarmandi = $request->input('kamarmandi',0);
        // $harga_awal = $request->input('harga_awal',0);
        // $harga_akhir = $request->input('harga_akhir',999999999999999999);
        $ruangan = $request->ruangan;
        $kamarmandi = $request->kamarmandi;
        $harga_awal = $request->harga_awal;
        $harga_akhir = $request->harga_akhir;

        if(empty($ruangan)){
            $ruangan = 0;
        }
        if(empty($kamarmandi)){
            $kamarmandi = 0;
        }
        if(empty($harga_awal)){
            $harga_awal = 0;
        }
        if(empty($harga_akhir)){
            $harga_akhir = 9999999999999999999;
        }

        $activity = session('activity');

        // echo "<script>alert('rumah : ".$rumah."')</script>";
        // echo "<script>alert('".is_integer($harga_awal)."')</script>";

        $result = [];

        if(!empty($query)){
            if($rumah!=""){
                $result1 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","rumah")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('alamat_properti', 'LIKE', '%'. $query .'%')
                ->where('status', 1)->get();
                // if(is_array($result1)){
                    foreach($result1 as $item){
                        array_push($result,$item);
                    }
                // }
                // if(is_array($result2)){
                // }
            }
            if($apartemen!=""){
                $result1 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","apartemen")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('alamat_properti', 'LIKE', '%'. $query .'%')
                ->where('status', 1)->get();
                // if(is_array($result1)){
                    foreach($result1 as $item){
                        array_push($result,$item);
                    }
                // }
                // if(is_array($result2)){
                // }
            }
            if($tanah!=""){
                $result2 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","tanah")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('alamat_properti', 'LIKE', '%'. $query .'%')
                ->where('status', 1)->get();
                // if(is_array($result1)){
                // }
                // if(is_array($result2)){
                    foreach($result2 as $item){
                        array_push($result,$item);
                    }
                // }
            }
        }
        else{
            // $result = property::where("kategori_properti",$activity)->get();
            if($rumah!=""){
                $result1 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","rumah")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('status', 1)->get();
                // $result1 = property::where("kategori_properti",$activity)->where("jenis_properti","rumah")->where('harga_properti', '>=', $harga_awal)->where('harga_properti', '<=', $harga_akhir)->get();
                // echo '<script>alert("'.count($result1).'")</script>';
                // if(is_array($result1)){
                    foreach($result1 as $item){
                        array_push($result,$item);
                    }
                // }
                // if(is_array($result2)){
                // }
            }
            if($apartemen!=""){
                $result2 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","apartemen")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('status', 1)->get();
                // if(is_array($result1)){
                // }
                // if(is_array($result2)){
                    foreach($result2 as $item){
                        array_push($result,$item);
                    }
                // }
            }
            if($tanah!=""){
                $result2 = property::where("kategori_properti",$activity)
                ->where("jenis_properti","tanah")
                ->where('harga_properti', '>=', $harga_awal)
                ->where('harga_properti', '<=', $harga_akhir)
                ->where('jumlah_ruangan_properti', '>=', $ruangan)
                ->where('jumlah_kamar_mandi_properti', '>=', $kamarmandi)
                ->where('status', 1)->get();
                // if(is_array($result1)){
                // }
                // if(is_array($result2)){
                    foreach($result2 as $item){
                        array_push($result,$item);
                    }
                // }
            }
        }
        // echo "<script>alert('".count($result)."')</script>";
        return view("beliRumah", ["data_properti" => $result]);
    }
}
