<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Kepada : {{$seller->nama_user}}, properti anda telah dibeli dengan detail sebagai berikut : <br>
    Nama pembeli : {{$buyer->nama_user}} <br>
    Alamat properti : {{$properti->alamat_properti}} <br>
    Kategori properti : {{$properti->kategori_properti}} <br>
    Harga properti : {{$properti->harga_properti}} <br>
    Tgl beli : {{$tgl}} <br>
    {{-- propert milik {{$user->id_user}} dibeli seseorang --}}
</body>
</html>
