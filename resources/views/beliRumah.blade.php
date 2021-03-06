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
        .contentHeader{
            /* margin-left: 15%; */
            text-align: center;
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
        .item{
            width: 23vw;
            height: 40vh;
            float: left;
            background-color: white;
            border-radius: 10px;
            margin-left: 1%;
            margin-top: 1%;
            text-align: center;
        }
        .item:hover{
            cursor: pointer;
            background-color: wheat;
        }
        .itemHeader{
            width: 100%;
            height: 10%;
            padding-top: 10px;
        }
        .itemContent{
            width: 100%;
            height: 70%;
        }
        .itemFooter{
            width: 100%;
            height: 10%;
        }
        .gambarItem{
            width: 80%;
            height: 60%;
            margin-top: 5%;
        }
        .view{
            margin-left: 1%;
            float: left;
        }
        .search{
            width: 70%;
            height: 10%;
            margin-left: 15%;
            margin-top: 1%;
        }
        .searchBar{
            width: 90%;
            height: 100%;
            font-size: 15pt;
        }
        .searchBtn{
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
            <div class="search">
                <form action="/search" method="post" >
                    @csrf
                    <input type="text" name="search" id="" class="searchBar">
                    <input type="submit" value="search" class="searchBtn">
                </form>
            </div>
            <div class="contentTextInner">
                <div class="contentHeader">
                    @if ($data_properti!=null)
                        @if ($data_properti[0]->kategori_properti=='beli')
                            <h1>beli properti</h1>
                        @else
                            <h1>kontrak properti</h1>
                        @endif
                    @endif

                </div>
                @isset($data_properti)
                    @foreach ($data_properti as $properti)
                    <div class="item" onclick="moveTo('properti_{{$properti->id_properti}}')">
                        <div class="itemHeader" style="font-size: 18pt">
                            {{$properti->alamat_properti}}
                        </div>
                        <hr>
                        <div class="itemContent">
                            <img src="{{URL::asset($properti->foto_properti)}}" alt="" class="gambarItem">
                            <div class="jenisProp" style="font-size: 12pt;">
                                {{ $properti->jenis_properti }}
                            </div>
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
                        <div class="itemFooter">
                            <div class="view">
                                view: {{ $properti->view_properti }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endisset
            </div>
            <div class="backgroundImg"></div>
        </div>
    </div>
</body>
</html>
