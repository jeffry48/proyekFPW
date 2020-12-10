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
            text-align: center;
        }
        .item{
            width: 23vw;
            height: 40vh;
            float: left;
            background-color: white;
            border-radius: 10px;
            margin-left: 1%;
            margin-top: 1%;
        }
        .item:hover{
            cursor: pointer;
            background-color: wheat;
        }
        .gambarItem{
            width: 80%;
            height: 40%;
            margin-top: 5%;
            /* background-color: yellow; */
        }
        .view{
            margin-left: 1%;
            float: left;
        }
        .search{
            /* float: left; */
            width: 70%;
            height: 10%;
            /* background-color: red; */
            margin-left: 15%;
            margin-top: 1%;
        }
        .searchBar{
            width: 90%;
            height: 100%;
            font-size: 15pt;
        }
        .searchBtn{
            width: 5%;
            height: 30px;
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
            <div class="search">
                <form action="/search" method="POST" >
                    @csrf
                    <input type="text" name="search" id="" class="searchBar">
                    <input type="submit" value="" class="searchBtn">
                </form>
            </div>
            <div class="contentTextInner">
                @isset($data_properti)
                    @foreach ($data_properti as $properti)
                    <div class="item" onclick="moveTo('properti_{{$properti->id_properti}}')">
                        <div class="itemHeader" style="font-size: 18pt">
                            {{$properti->alamat_properti}}
                        </div>
                        <hr>
                        <div class="view">
                            view: {{ $properti->view_properti }}
                        </div>
                        <img src="" alt="" class="gambarItem">
                        <div class="item_desc" style="font-size: 14pt">
                            @if (strlen($properti->deskripsi_properti)>20)
                                {{ substr($properti->deskripsi_properti, 0, 20) }}...
                            @else
                                {{$properti->deskripsi_properti}}
                            @endif
                        </div>
                        <div class="harga" style="font-size: 12pt;">
                            Rp. {{ $properti->harga_properti }}
                        </div>
                    </div>
                    @endforeach
                @endisset
                @php
                    if(!is_array($data_properti)){
                        echo "Tidak ada";
                    }
                @endphp
            </div>
            <div class="backgroundImg"></div>
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
