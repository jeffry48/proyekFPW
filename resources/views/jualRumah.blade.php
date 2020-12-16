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
            echo "<script>alert('tanah harus memiliki ruangan dan kamar mandi 0')</script>";
            session()->forget('pesan');
        }
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
                <h1>Daftarkan properti Untuk Dijual</h1>
                <hr>
                <form action="jualProperti" method="POST" enctype="multipart/form-data">
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

                    @error('jumRuangan')
                        <div class="text" style="color: red"></div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        jumlah kamar mandi
                    </div>
                    <input type="text" name="jumKamarMandi" id="" class="input"><br>

                    @error('jumKamarMandi')
                        <div class="text" style="color: red"></div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        alamat
                    </div>
                    <input type="text" name="alamat" id="" class="input"><br>

                    @error('alamat')
                        <div class="text" style="color: red"></div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        harga
                    </div>
                    <input type="text" name="harga" id="" class="input"><br>

                    @error('harga')
                        <div class="text" style="color: red"></div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        foto
                    </div>
                    {{--Alex just now--}}
                    <div class="input">
                        <input type="file" name="foto" id="" accept = 'image/jpeg , image/jpg, image/png'> <br>
                    </div>
                    {{--Alex just now--}}

                    <div class="text">
                        <input type="submit" value="submit" class="registerBtn">
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
