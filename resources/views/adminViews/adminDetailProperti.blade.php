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
            width: 50vw;
            font-size: 12pt;
            margin-left: 1%;
            margin-top: 0.5%;
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
        .cardbox:hover{
            background-color: wheat;
            cursor: default;
        }
        .headerRec{
            font-size: 16pt;
        }
        .contentRec{
            margin-left: 2%;
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
            <button class="regLogBtn"><a href="/logout">Logout</a></button>
        </div>
    </div>

    @php
        use App\users;
        use App\property;
    @endphp

    <div class="content">
        <div class="contentText">
            <div class="contentHeader">
                @isset($user_login)
                    {{-- Welcome, {{ $user_login->nama_user }} --}}
                @endisset
            </div>
            <div class="contentTextInner">
                @isset($id_properti)
                    @php
                        $data_properti=property::find($id_properti);
                    @endphp
                    <img src="{{URL::asset($data_properti->foto_properti)}}" alt="" class="gambarItem">
                    <div class="textItem" style="font-size: 18pt;">
                        {{ $data_properti->alamat_properti }}
                    </div>
                    <div class="textItem" style="font-size: 14pt;">
                        <u>jenis properti: {{ $data_properti->jenis_properti }}</u>
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
                            $now = time();
                            $your_date = strtotime($data_properti->tgl_terdaftar_properti);
                            $datediff = $now - $your_date;
                        ?>
                        @if (round($datediff / (60 * 60 * 24))<30)
                            terdaftar: {{ round($datediff / (60 * 60 * 24)) }} hari yang lalu
                        @else
                            terdaftar: {{ round(round($datediff / (60 * 60 * 24))/30) }} bulan yang lalu
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </div>

</body>
</html>
