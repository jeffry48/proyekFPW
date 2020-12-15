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
            background-color: white;
            overflow: auto;
        }
        .backgroundImg{
            width: inherit;
            height: inherit;
            background-image: linear-gradient(to bottom,  rgba(0, 0, 0, 0.52), rgba(255, 255, 255, 1)), url('hotel.jpg');
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
            font-size: 12pt;
        }
        .gambarImg{
            width: 10%;
            height: 120%;
            background-color: lightblue;
            float: left;
        }
        .text{
            margin-left: 100px;
            margin-top: 20px;
            font-size: 16pt;
            width: 20%;
            float: left;
        }
        .input{
            margin-top: 20px;
            font-size: 16pt;
            margin-left: 1%;
            width: 40%;
            float: left;
        }
        .submitBtn{
            margin-left: 100px;
            margin-top: 50px;
            font-size: 12pt;
            width: 20%;
            float: left;
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
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
        $user = session('loggedin');
        $activity = session('activity');
        // echo '<script>alert("'.$user.'")</script>';
    @endphp
    <div class="header">
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
    </div>

    <div class="content">
        <div class="contentText">
            <div class="gambarImg"></div>

            <form action="insertCicilan" method="POST">
                @csrf

                <h1>cicilan</h1>
                <hr>
                <div class="text">
                    durasi
                </div>
                <input type="text" name="durasi" id="" class="input" placeholder="dalam bulan">

                <div class="text">
                    besar bunga:
                </div>
                <div class="input">
                    @php
                        $bunga=session('harga')*(10/100);
                        echo $bunga;
                    @endphp
                </div>
                <div class="text">
                    harga total:
                </div>
                <div class="input">
                    @php
                        echo session('harga')+$bunga+session('pajak_beli');
                    @endphp
                </div>
                <input type="hidden" name="bungaCicilan" value="{{$bunga}}">
                <input type="submit" value="submit" class="submitBtn">

            </form>
        </div>
    </div>
</body>
</html>
