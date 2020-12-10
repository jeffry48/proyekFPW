<<<<<<< Updated upstream
=======
@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Carbon;
@endphp
>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #navButtons{
<<<<<<< Updated upstream
            /* float: right; */
            /* margin-right: 5px;
            margin-top: 2px; */
            background-color: lightsalmon;
            border: solid darkgray 1px;x
            width: 25%;
            border-radius: 5px;
            font-size: 15pt;
            margin-top: 70px;
=======
            background-color: lightsalmon;
            border: solid darkgray 1px;
            width: 25%;
            height: 100%;
            border-radius: 5px;
            font-size: 15pt;
>>>>>>> Stashed changes
        }
        #navButtons:hover{
            background-color: salmon;
            cursor: pointer;
        }
<<<<<<< Updated upstream
=======
        .headerContent{
            height: 70%;
            width: 100%;
        }
        .nav{
            height: 30%;
            width: 100%;
        }
>>>>>>> Stashed changes
        .logo2{
            width: 20%;
            float: right;
            margin-right: 2%;
            /* background-color: red; */
        }
        .regLogBtn{
<<<<<<< Updated upstream
            width: 49%;
            height: 30px;
            margin-top: 30px;
            background-color: lightsalmon;
            border: solid black 1px;
            border-radius: 10px;
=======
            width: 10%;
            height: 30px;
            margin-top: 30px;
            margin-right: 20px;
            background-color: lightsalmon;
            border: solid black 1px;
            border-radius: 10px;
            float: right;
>>>>>>> Stashed changes
        }
        .header{
            width: 99vw;
            height: 15vh;
            background-color: lightsalmon;
        }
        .content{
            width: 99vw;
<<<<<<< Updated upstream
            height: 72vh;
        }
        .footer{
            width: 99vw;
            height: 10vh;
            background-color: lightgreen;
        }
        .copyright{
            font-size: 24pt;
            float: left;
        }
        .noTelp{
            float: right;
            text-align: right;
            font-size: 18pt;
=======
            height: 82vh;
>>>>>>> Stashed changes
        }
        .picture{
            width: 40%;
            height: 57vh;
            float: left;
        }
        .contentText{
            width: 100%;
            height: 100%;
            float:left;
<<<<<<< Updated upstream
            background-color: white;
            overflow: hidden;
        }
        .backgroundImg{
            width: 99vw;
            height: 69vh;
            background-image: linear-gradient(to top,  rgba(0, 0, 0, 0.52), rgba(255, 255, 255, 1)), url('hotel.jpg');
            background-size: cover;
            background-position: center;
        }
=======
            overflow: hidden;
        }
>>>>>>> Stashed changes
        .contentHeader{
            margin-top: 20px;
            font-size: 24pt;
            text-align: center;
        }
        .contentTextInner{
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .gambarItem{
            width: 45vw;
            height: 66vh;
            float: left;
        }
        .textItem{
            float: left;
            width: 50%;
            font-size: 12pt;
            margin-left: 1%;
            margin-top: 0.5%;
        }
<<<<<<< Updated upstream
=======
        .pembayaranBtn{
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
        }
>>>>>>> Stashed changes
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }
    </script>
</head>
<body>
<<<<<<< Updated upstream
    <div class="header">
        <div class="logo">
            <div class="logo2">
                <button class="regLogBtn" onclick="moveTo()">login</button>
                <button class="regLogBtn" onclick="moveTo()">register</button>
            </div>
        </div>
        <div class="nav">
            <button name="" id="navButtons" onclick="moveTo('beli')" style="width: 25%;">beli Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('kontrak')"style="width: 25%;">kontrak Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('jual')"style="width: 25%;">Jual Rumah</button>
=======
    @php
        if(session('pesan')!=null){
            echo "<script>alert('pembelian properti sedang diproses')</script>";
            session()->forget('pesan');
        }
    @endphp
    <div class="header">
        <div class="headerContent">
            @if (session('loggedin')!=null)
                <button class="regLogBtn" onclick="moveTo('profile')">profile</button>
            @else
                <button class="regLogBtn" onclick="moveTo('login')">login</button>
                <button class="regLogBtn" onclick="moveTo('register')">register</button>
            @endif
        </div>
        <div class="nav">
            <button name="" id="navButtons" onclick="moveTo('beli')">Beli Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('kontrak')">Kontrak Rumah</button>
            @if (session('loggedin')!=null)
                <button name="" id="navButtons" onclick="moveTo('jual')">Jual Rumah</button>
            @endif
>>>>>>> Stashed changes
        </div>
    </div>

    <div class="content">
        <div class="contentText">
            <div class="contentHeader">
                @isset($user_login)
                    {{-- Welcome, {{ $user_login->nama_user }} --}}
                @endisset
            </div>
            <div class="contentTextInner">
                @isset($data_properti)
<<<<<<< Updated upstream
                    <img src="{{ $data_properti->foto_properti }}" alt="" class="gambarItem">
=======
                    <img src="" alt="" class="gambarItem">
>>>>>>> Stashed changes
                    <div class="textItem" style="font-size: 18pt;">
                        {{ $data_properti->alamat_properti }}
                    </div>
                    <div class="textItem">
                        {{ $data_properti->harga_properti }}
                    </div>
                    <div class="textItem">
                        {{ $data_properti->deskripsi_properti }}
                    </div>
                    <div class="textItem">
<<<<<<< Updated upstream
=======
                        ruangan: {{ $data_properti->jumlah_ruangan_properti }}
                    </div>
                    <div class="textItem">
                        kamar mandi:  {{ $data_properti->jumlah_kamar_mandi_properti }}
                    </div>
                    <div class="textItem">
>>>>>>> Stashed changes
                        View: {{ $data_properti->view_properti }}
                    </div>
                    <div class="textItem">
                        <?php
<<<<<<< Updated upstream
                            // $now=date("Y/m/d");
                            // $d=strtotime($data_properti->tgl_terdaftar_properti);
                            // echo $now;

                            $now = time(); // or your date as well
                            $your_date = strtotime($data_properti->tgl_terdaftar_properti);
                            $datediff = $now - $your_date;
                        ?>
                        @if (round($datediff / (60 * 60 * 24))<30)
                            terdaftar: {{ round($datediff / (60 * 60 * 24)) }} hari yang lalu
                        @else
                            terdaftar: {{ round($datediff / (60 * 60 * 24))/30 }} bulan yang lalu
                        @endif
                    </div>
                @endisset
            </div>
            <div class="backgroundImg"></div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">

        </div>
        <div class="noTelp">

        </div>
    </div>
=======
                            $cnow = Carbon::now();
                            $since = Carbon::parse($data_properti->tgl_terdaftar_properti);

                            $diff = $since->diffInDays($cnow);
                            // echo "<script>alert(".$diff.")</script>";

                            $now = time();
                            $your_date = strtotime($data_properti->tgl_terdaftar_properti);
                            $datediff = $now - $your_date;
                        ?>
                        {{-- @if (round($datediff / (60 * 60 * 24))<30)
                            terdaftar: {{ round($datediff / (60 * 60 * 24)) }} hari yang lalu
                        @else
                            terdaftar: {{ round($datediff / (60 * 60 * 24))/30 }} bulan yang lalu
                        @endif --}}
                        @if ($diff/30>1)
                            Terdaftar : {{round($diff/30)}} bulan {{$diff%30}} hari yang lalu
                        @elseif($diff%30==0)
                            Terdaftar : {{round($diff/30)}} bulan yang lalu
                        @elseif ($diff/30<1)
                            Terdaftar : {{$diff}} hari yang lalu
                        @endif
                    </div>
                    <div class="textItem">
                        @if (session('loggedin')!=null)
                            @if ($data_properti->kategori_properti=='beli')
                                <button class="pembayaranBtn" onclick="moveTo('showPembayaranBeli_{{$data_properti->id_properti}}')">pembayaran beli</button>
                            @else
                                <button class="pembayaranBtn" onclick="moveTo('showPembayaranKontrak_{{$data_properti->id_properti}}')">pembayaran kontrak</button>
                            @endif
                        @endif
                    </div>
                    @php
                        $jenis = $data_properti->jenis_properti;
                        // echo "<script>alert(".$jenis.")</script>";
                        $list = DB::table('properti')->where('jenis_properti', $jenis)->get();
                        if(count($list)>0){
                            $rekomendasi = $list;
                        }
                        $ctr_rekom = 0;
                    @endphp
                    @isset($rekomendasi)
                    <div class="textItem">
                        <h3>Rekomendasi</h3>
                        <div class="slider">
                            @foreach ($rekomendasi as $item)
                                @if ($ctr_rekom<4)
                                    @php
                                        if($item->id_properti!=$data_properti->id_properti){
                                            // echo $item->id_properti;
                                            echo '<div class="cardbox" style="width: 130px; padding : 25px; background-color: coral;" onclick="moveTo(';
                                            echo "'properti_".$item->id_properti."')";
                                            echo '">';
                                            echo '<img src="" alt="" style="height: 100px; width: 100px;">
                                            <div style="text-align: center">'.$item->id_properti.'</div>
                                            <div style="text-align: center">'.$item->alamat_properti.'</div>
                                            </div>';
                                        }
                                        $ctr_rekom++;
                                    @endphp
                                @endif
                                {{-- <a href=""><div>{{$item->id_properti}}</div></a> --}}
                            @endforeach
                        </div>
                    </div>
                    @endisset
                @endisset
            </div>
        </div>
    </div>

>>>>>>> Stashed changes
</body>
</html>
