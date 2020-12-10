<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #navButtons{
            /* float: right; */
            /* margin-right: 5px;
            margin-top: 2px; */
            background-color: lightsalmon;
            border: solid darkgray 1px;x
            width: 25%;
            border-radius: 5px;
            font-size: 15pt;
            margin-top: 70px;
        }
        #navButtons:hover{
            background-color: salmon;
            cursor: pointer;
        }
        .logo2{
            width: 20%;
            float: right;
            margin-right: 2%;
            /* background-color: red; */
        }
        .regLogBtn{
            width: 49%;
            height: 30px;
            margin-top: 30px;
            background-color: lightsalmon;
            border: solid black 1px;
            border-radius: 10px;
        }
        .header{
            width: 99vw;
            height: 15vh;
            background-color: lightsalmon;
        }
        .content{
            width: 99vw;
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
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }
    </script>
</head>
<body>
    @php
        // session(['login' => 'test']);
        $user = session('login', 'test');
        $activity = session('activity');
        // echo '<script>alert("'.$user.'")</script>';
    @endphp
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
                        Rp {{ $data_properti->harga_properti }}
                    </div>
                    <div class="textItem">
                        {{ $data_properti->deskripsi_properti }}
                    </div>
                    <div class="textItem">
                        View: {{ $data_properti->view_properti }}
                    </div>
                    <div class="textItem">
                        <?php

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
                    <div class="textItem">
                        @php
                            if($activity=="Beli"){
                                echo '<form action="/beli_rumah" method="POST">
                                    '.csrf_field().'
                            <input type="hidden" name="id_properti" value="'.$data_properti->id_properti.'">
                            <input type="hidden" name="id_user" value="'.$user.'">
                            <input type="submit" value="Beli">
                        </form>';
                            }
                            else if($activity=="Kontrak"){
                                echo '<form action="/kontrak_rumah" method="post">
                                    '.csrf_field().'
                            <input type="hidden" name="id_properti" value="'.$data_properti->id_properti.'">
                            <input type="hidden" name="id_user" value="'.$user.'">
                            Durasi : <input type="number" name="durasi" id=""> (dalam bulan)
                            <input type="submit" value="kontrak">
                        </form>';
                            }
                        @endphp
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
</body>
</html>
