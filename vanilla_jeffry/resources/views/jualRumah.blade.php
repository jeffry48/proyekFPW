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
            /* margin-right: 5px;
            margin-top: 2px; */
            background-color: lightsalmon;
            border: solid darkgray 1px;
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
=======
            width: 10%;
            height: 30px;
            margin-top: 30px;
            margin-right: 20px;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        /* .footer{
            width: 99vw;
            height: 10vh;
            background-color: lightgreen;
        } */
        /* .copyright{
            font-size: 24pt;
            float: left;
        }
        .noTelp{
            float: right;
            text-align: right;
            font-size: 18pt;
        } */
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            height: 120%;
            background-color: lightblue;
            float: left;
        }
        .contText{
            width: 30%;
            height: 100%;
            float: left;
            /* background-color: yellow; */
        }
        .contInput{
            width: 30%;
            height: 100%;
            float: left;
            /* background-color: cadetblue; */
        }
        .text{
            margin-left: 30%;
            font-size: 16pt;
            margin-top: 5%;
        }
        .input{
            font-size: 16pt;
            margin-top: 4%;
        }
        .containerInput{
            float: left;
            width: 60%;
            height: 100%;
            /* background-color: red; */
            /* margin-left: 5%; */
            overflow: auto;
=======
            height: 160%;
            background-color: lightblue;
            float: left;
            position: static;
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
        .registerBtn{
            width: 50%;
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
            font-size: 16pt;
>>>>>>> Stashed changes
        }
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }
    </script>
</head>
<body>
    <div class="header">
<<<<<<< Updated upstream
        <div class="logo">
            <div class="logo2">
                <button class="regLogBtn" onclick="moveTo('login')">login</button>
                <button class="regLogBtn" onclick="moveTo('register')">register</button>
            </div>
        </div>
        <div class="nav">
            <button name="" id="navButtons" onclick="moveTo('beli')">Beli Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('kontrak')">Kontrak Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('jual')">Jual Rumah</button>
=======
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
>>>>>>> Stashed changes
        </div>
    </div>

    <div class="content">
        <div class="contentText">
            <div class="gambarImg"></div>
<<<<<<< Updated upstream
                <h1>Daftarkan Rumah Untuk Dijual</h1>
                <hr>
                <form action="/jualProperti" method="POST">
                    @csrf
                    <div class="contText">
                        <div class="text">
                            jenis properti:
                        </div>
                        <div class="text">
                            kategori:
                        </div>
                        <div class="text">
                            deskripsi:
                        </div>

                        <br><br><br><br>
                        <br><br>

                        <div class="text">
                            jumlah ruangan:
                        </div>
                        <div class="text">
                            jumlah kamar mandi:
                        </div>

                        <div class="text">
                            alamat:
                        </div>
                        <div class="text">
                            harga:
                        </div>
                        <div class="text">
                            foto
                        </div>
                    </div>
                    <div class="contInput">
                        {{-- lihat di week 6 andy buat masalah ambil value dr select --}}
                        <select name="jenis" id="" class="input">
                            <option value="Rumah">Rumah</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Apartemen">Gedung</option>
                        </select> <br>
                        <select name="kategori" id="" class="input">
                            <option value="Beli">Beli</option>
                            <option value="Kontrak">Kontrak</option>
                        </select> <br>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="input"></textarea>
                        <input type="text" name="jumRuangan" id="" class="input">
                        <input type="text" name="jumKamarMandi" id="" class="input">
                        <input type="text" name="alamat" id="" class="input">
                        <input type="text" name="harga" id="" class="input">
                        <input type="text" name="foto" id="" class="input"> <br>

                        <input type="submit" value="register" class="registerBtn" style="margin-top: 5%;">
                    </div>
=======

                <h1>Daftarkan Rumah Untuk Dijual</h1>
                <hr>
                <form action="jualProperti" method="POST">
                    @csrf
                    <div class="text">
                        jenis properti:
                    </div>
                    <div class="input">
                        <select name="jenis" id="" style="font-size: 16pt">
                            <option value="rumah">Rumah</option>
                            <option value="tanah">Tanah</option>
                            <option value="apartemen">Apartemen</option>
                        </select>
                    </div>

                    <div class="text">
                        kategori:
                    </div>
                    <div class="input">
                        <select name="kategori" id="" style="font-size: 16pt">
                            <option value="beli">Beli</option>
                            <option value="kontrak">Kontrak</option>
                        </select>
                    </div>

                    <div class="text">
                        deskripsi
                    </div>
                    <textarea name="deskripsi" id="" cols="30" rows="5" class="input" style="font-size: 12pt;"></textarea> <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="text">
                        preparasi properti
                    </div>
                    <textarea name="preparasi" id="" cols="30" rows="5" class="input" style="font-size: 12pt;"></textarea> <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="text">
                        jumlah ruangan
                    </div>
                    <input type="text" name="jumRuangan" id="" class="input"><br>
                    <div class="text">
                        jumlah kamar mandi
                    </div>
                    <input type="text" name="jumKamarMandi" id="" class="input"><br>
                    <div class="text">
                        alamat
                    </div>
                    <input type="text" name="alamat" id="" class="input"><br>
                    <div class="text">
                        harga
                    </div>
                    <input type="text" name="harga" id="" class="input"><br>
                    <div class="text">
                        foto
                    </div>
                    <div class="input">
                        <input type="file" name="foto" id=""> <br>
                    </div>

                    <div class="text">
                        <input type="submit" value="submit" class="registerBtn">
                    </div>

>>>>>>> Stashed changes
                </form>

        </div>
    </div>

    {{-- <div class="footer">
        <div class="copyright">

        </div>
        <div class="noTelp">

        </div>
    </div> --}}
</body>
</html>
