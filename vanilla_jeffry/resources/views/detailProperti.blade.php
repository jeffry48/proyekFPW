@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #navButtons{
            background-color: lightsalmon;
            border: solid darkgray 1px;
            width: 25%;
            height: 100%;
            border-radius: 5px;
            font-size: 15pt;
        }
        #navButtons:hover{
            background-color: salmon;
            cursor: pointer;
        }
        .headerContent{
            height: 70%;
            width: 100%;
        }
        .nav{
            height: 30%;
            width: 100%;
        }
        .logo2{
            width: 20%;
            float: right;
            margin-right: 2%;
            /* background-color: red; */
        }
        .regLogBtn{
            width: 10%;
            height: 30px;
            margin-top: 30px;
            margin-right: 20px;
            background-color: lightsalmon;
            border: solid black 1px;
            border-radius: 10px;
            float: right;
        }
        .header{
            width: 99vw;
            height: 15vh;
            background-color: lightsalmon;
        }
        .content{
            width: 99vw;
            height: 82vh;
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
            overflow: auto;
        }
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
        .pembayaranBtn{
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
        }
        .slider{
            overflow: auto;
            width: 100%;
        }
        .cardbox{
            float: left;
            width: 97%;
            padding : 1%;
            background-color: coral;
        }
        .headerRec{
            font-size: 16pt;
        }
        .contentRec{
            float: left;
        }
        .picRec{
            float: left;
            height: 100px;
            width: 100px;
        }
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }
    </script>
</head>
<body>
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
                    <img src="" alt="" class="gambarItem">
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
                        ruangan: {{ $data_properti->jumlah_ruangan_properti }}
                    </div>
                    <div class="textItem">
                        kamar mandi:  {{ $data_properti->jumlah_kamar_mandi_properti }}
                    </div>
                    <div class="textItem">
                        View: {{ $data_properti->view_properti }}
                    </div>
                    <div class="textItem">
                        <?php
                            $cnow = Carbon::now();
                            $since = Carbon::parse($data_properti->tgl_terdaftar_properti);

                            $diff = $since->diffInDays($cnow);
                            // echo "<script>alert(".$diff.")</script>";

                            $now = time();
                            $your_date = strtotime($data_properti->tgl_terdaftar_properti);
                            $datediff = $now - $your_date;
                        ?>
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
                                    @if ($item->id_properti!=$data_properti->id_properti)
                                    <div></div>
                                    <div class="cardbox" onclick="moveTo('properti_{{$item->id_properti}}')">
                                        <img src="" alt="" class="picRec">
                                        <div class="contentRec">
                                            <div class="headerRec">
                                                <div>{{$item->alamat_properti}}</div>
                                            </div>
                                            <div>jenis properti: {{$item->jenis_properti}}</div>
                                            <div>{{$item->deskripsi_properti}}</div>
                                            <div style="font-size: 15pt;">{{$item->harga_properti}}</div>
                                        </div>
                                    </div>
                                    @php
                                        $ctr_rekom++;
                                    @endphp
                                    @endif

                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endisset

                @endisset
            </div>
        </div>
    </div>

</body>
</html>
