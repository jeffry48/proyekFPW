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
            width: 50%;
            float: left;
        }
        .gambarItem{
            width: 45vw;
            height: 75vh;
            float: left;
        }
        .textItem{
            width: 50%;
            font-size: 12pt;
            margin-left: 1%;
            margin-top: 1%;
        }
        .pembayaranBtn{
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
        }
        .usersCont{
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            background-color: wheat;
            border: solid black 1px;
            margin-top: 1px;
        }
        .usersCont:hover{
            background-color: lightcoral;
            cursor: default;
        }
        .userHeader{
            font-size: 14pt;
        }
        .beliBtn{
            margin-left: 1%;
            margin-top: 1%;
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
        }
        .beliBtn:hover{
            cursor: pointer;
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

    @php
        use App\users;
        use App\UserBeliModel;
        use App\property;
        use App\cicilanModel;
    @endphp

    <div class="content">
        <div class="contentText">
            <div class="contentHeader">
                @isset($user_login)
                    {{-- Welcome, {{ $user_login->nama_user }} --}}
                @endisset
            </div>
            @isset($idBeli)
                @php
                    $dataBeli=UserBeliModel::find($idBeli);
                    $dataUser=users::find($dataBeli->id_user);
                    $dataProperti=property::find($dataBeli->id_properti);

                    // dd($dataUser);
                @endphp
                <img src="{{URL::asset($dataProperti->foto_properti)}}" alt="" class="gambarItem">
                <div class="contentTextInner">
                    <div class="textItem" style="font-size: 18pt;">
                        Detail properti:
                    </div>
                    <div class="textItem">
                        {{ $dataProperti->alamat_properti }}
                    </div>
                    <div class="textItem">
                        {{ $dataProperti->harga_properti }}
                    </div>
                    <div class="textItem">
                        deskripsi: {{ $dataProperti->deskripsi_properti }}
                    </div>
                    <div class="textItem">
                        ruangan: {{ $dataProperti->jumlah_ruangan_properti }}
                    </div>
                    <div class="textItem">
                        kamar mandi:  {{ $dataProperti->jumlah_kamar_mandi_properti }}
                    </div>

                    <hr>

                    <div class="textItem" style="font-size: 18pt;">
                        Pembeli:
                    </div>
                    <div class="textItem">
                        nama user: {{ $dataUser->nama_user }}
                    </div>
                    <div class="textItem">
                        no telp: {{ $dataUser->no_telp_user }}
                    </div>
                    <div class="textItem">
                        email: {{ $dataUser->email_user }}
                    </div>
                    <div class="textItem">
                        pesan: {{ $dataBeli->pesan_untuk_penjual }}
                    </div>
                    <div class="textItem">
                        metode pembayaran: {{ $dataBeli->metode_pembelian }}
                    </div>
                    @if ($dataBeli->metode_pembelian=='kredit')
                        @php
                            $dataCicilan=cicilanModel::all()
                            ->where('id_beli', $dataBeli->id_beli)->all();
                            sort($dataCicilan);
                        @endphp

                        <div class="textItem">
                            durasi kredit: {{$dataCicilan[0]->durasi_cicilan}}
                        </div>
                        <div class="textItem">
                            pembayaran setiap bulan: {{($dataBeli->total_beli)/($dataCicilan[0]->durasi_cicilan)}}
                        </div>

                        <hr>
                    @endif
                    <div class="textItem">
                        pajak: {{ $dataBeli->pajak_beli }}
                    </div>
                    <div class="textItem">
                        total: {{ $dataBeli->total_beli }}
                    </div>
                    <form action="prosesBeli" method="POST">
                        @csrf

                        <input type="hidden" name="idBeli" value="{{$dataBeli->id_beli}}">
                        <input type="hidden" name="idProperti" value="{{$dataProperti->id_properti}}">
                        <input type="submit" value="terima pembelian" class="beliBtn">
                    </form>
                </div>
            @endisset
        </div>
    </div>

</body>
</html>
