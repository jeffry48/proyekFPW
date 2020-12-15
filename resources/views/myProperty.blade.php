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
            width: 5%;
            height: 30px;
        }
        .filterBar{
            font-size: 16pt;
        }
        .filterCont{
            margin-left: 3%;
            font-size: 16pt;
            margin-bottom: 1%;
        }
        .filterBtn{
            font-size: 14pt;
            margin-left: 1%;
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
            <div class="contentTextInner">
                <div class="contentHeader">
                    <h1>my property</h1>
                </div>
                <div class="filterCont">
                    <form action="filterMyProp" method="POST">
                        @csrf
                        filter here
                        <select name="filter" id="" class="filterBar">
                            <option value="jual">jual</option>
                            <option value="kontrak">kontrak</option>
                        </select>
                        <input type="submit" value="filter" class="filterBtn">
                    </form>
                </div>

                @php
                    use App\property;
                @endphp

                @isset($data_properti)
                    @foreach ($data_properti as $properti)
                        @php
                            $data=property::all()
                            ->where('id_properti', $properti->id_properti)
                            ->where('status', 1)->all();
                            sort($data);
                        @endphp

                        @for ($i = 0; $i < count($data); $i++)
                            <div class="item" onclick="moveTo('myProperti_{{$data[$i]->id_properti}}')">
                                <div class="itemHeader" style="font-size: 18pt">
                                    {{$data[$i]->alamat_properti}}
                                </div>
                                <hr>
                                <div class="itemContent">
                                    <img src="{{$data[$i]->foto_properti}}" alt="" class="gambarItem">
                                    <div class="item_desc" style="font-size: 14pt">
                                        @if (strlen($data[$i]->deskripsi_properti)>20)
                                            {{ substr($data[$i]->deskripsi_properti, 0, 20) }}...
                                        @else
                                            {{$data[$i]->deskripsi_properti}}
                                        @endif
                                    </div>
                                    <div class="harga" style="font-size: 12pt;">
                                        Rp. {{ $data[$i]->harga_properti }}
                                    </div>
                                </div>
                                <div class="itemFooter">
                                    <div class="view">
                                        view: {{ $data[$i]->view_properti }}
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endforeach
                @endisset
            </div>
            <div class="backgroundImg"></div>
        </div>
    </div>
</body>
</html>
