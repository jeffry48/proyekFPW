<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #navButtons{
            /* margin-right: 5px;
            margin-top: 2px; */
            background-color: lightsalmon;
            border: solid darkgray 1px;
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
        </div>
    </div>

    <div class="content">
        <div class="contentText">
            <div class="gambarImg"></div>
                <h1>Daftarkan Rumah Untuk Dijual</h1>
                <hr>
                <form action="" method="POST">
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
                            <option value="rumah">Rumah</option>
                            <option value="tanah">Tanah</option>
                            <option value="apartemen">Gedung</option>
                        </select> <br>
                        <select name="kategori" id="" class="input">
                            <option value="beli">Beli</option>
                            <option value="kontrak">Kontrak</option>
                        </select> <br>
                        <textarea name="deskripsi" id="" cols="30" rows="5" class="input"></textarea>
                        <input type="text" name="jumRuangan" id="" class="input">
                        <input type="text" name="jumKamarMandi" id="" class="input">
                        <input type="text" name="alamat" id="" class="input">
                        <input type="text" name="harga" id="" class="input">
                        <input type="text" name="kategori" id="" class="input"> <br>

                        <input type="submit" value="register" class="registerBtn" style="margin-top: 5%;">
                    </div>
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
