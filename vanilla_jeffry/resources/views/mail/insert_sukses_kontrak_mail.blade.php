<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Kepada : {{$buyer->nama_user}}, kontrak properti telah dikonfirmasi dengan detail sebagai berikut : <br>
    Nama penjual : {{$seller->nama_user}} <br>
    Alamat properti : {{$properti->alamat_properti}} <br>
    Harga properti : {{$properti->harga_properti}} <br>
    Tgl konfirmasi : {{$tgl}} <br>
    {{-- Tgl mulai kontrak : {{$tglAwal}} <br>
    Durasi : {{$durasi}} <br>
    Tgl akhir kontrak : {{$tglAkhir}} <br> --}}
    {{-- propert milik {{$user->id_user}} dibeli seseorang --}}
</body>
</html>
