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
        .detailBtn{
            width: 100%;
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
            <button class="regLogBtn"><a href="/logout">Logout</a></button>
        </div>
        <div class="nav">

        </div>
    </div>

    <div class="content">
        <div class="contentText">
            <div class="contentHeader">
                <h1>Admin Page</h1>
            </div>
            <div class="filterCont">
                <form action="filterReport" method="POST">
                    @csrf
                    filter here
                    <select name="filter" id="" class="filterBar">
                        <option value="pembelian">Pembelian yang belum disetujui</option>
                        <option value="properti">Properti yang dijual dan pembeli-pembelinya</option>
                    </select>
                    <input type="submit" value="filter" class="filterBtn">
                </form>
            </div>
            <div class="contentTextInner">
                <h1>Properti telah dijual/kontrak</h1>
                <h2>Beli</h2>
                <table border="1px">
                    <tr>
                        <th>ID User</th>
                        <th>Nama User</th>
                        <th>ID Properti</th>
                        <th>Alamat Properti</th>
                        <th>Jenis Properti</th>
                        <th>Kategori Properti</th>
                        <th>Total Beli</th>
                        <th>Metode Pembelian</th>
                        <th>detail properti</th>
                    </tr>
                    @foreach ($males as $item)
                        <tr>
                            <td>{{$item->id_user}}</td>
                            <td>{{$item->nama_user}}</td>
                            <td>{{$item->id_properti}}</td>
                            <td>{{$item->alamat_properti}}</td>
                            <td>{{$item->jenis_properti}}</td>
                            <td>{{$item->kategori_properti}}</td>
                            <td>{{$item->total_beli}}</td>
                            <td>{{$item->metode_pembelian}}</td>
                            <td><button class="detailBtn" onclick="moveTo('adminDetailProp_{{$item->id_properti}}')">detail</button></td>
                        </tr>
                    @endforeach
                </table>
                <h2>Kontrak</h2>
                <table border="1px">
                    <tr>
                        <th>ID User</th>
                        <th>Nama User</th>
                        <th>ID Properti</th>
                        <th>Alamat Properti</th>
                        <th>Jenis Properti</th>
                        <th>Kategori Properti</th>
                        <th>Harga</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhire</th>
                        <th>Durasi</th>
                        <th>detail properti</th>
                    </tr>
                    @foreach ($banget as $item)
                        <tr>
                            <td>{{$item->id_user}}</td>
                            <td>{{$item->nama_user}}</td>
                            <td>{{$item->id_properti}}</td>
                            <td>{{$item->alamat_properti}}</td>
                            <td>{{$item->jenis_properti}}</td>
                            <td>{{$item->kategori_properti}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->tgl_awal}}</td>
                            <td>{{$item->tgl_akhir}}</td>
                            <td>{{$item->durasi_kontrak}}</td>
                            <td><button class="detailBtn" onclick="moveTo('adminDetailProp_{{$item->id_properti}}')">detail</button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
