<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button><a href="/logout">Logout</a></button>
    <h1>Pembelian yang blm disetujui</h1>
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
        </tr>
        @foreach ($beli_belum_terbeli as $item)
            <tr>
                <td>{{$item->id_user}}</td>
                <td>{{$item->nama_user}}</td>
                <td>{{$item->id_properti}}</td>
                <td>{{$item->alamat_properti}}</td>
                <td>{{$item->jenis_properti}}</td>
                <td>{{$item->kategori_properti}}</td>
                <td>{{$item->total_beli}}</td>
                <td>{{$item->metode_pembelian}}</td>
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
        </tr>
        @foreach ($kontrak_belum_terkontrak as $item)
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
            </tr>
        @endforeach
    </table>
    <h1>Properti yang dijual dan pembeli-pembelinya</h1>
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
            </tr>
        @endforeach
    </table>
</body>
</html>