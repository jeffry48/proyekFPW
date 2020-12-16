<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @isset($user_login)
        Welcome, {{ $user_login->nama_user }}
    @endisset
    @isset($data_properti)
        <table border="1">
            @foreach ($data_properti as $properti)
                <tr>
                    <td><img width="100" src="{{ $properti->foto_properti }}" alt=""></td>
                    <td>{{ $properti->alamat_properti }}</td>
                    <td>{{ $properti->harga_properti }}</td>
                    <td>{{ $properti->deskripsi_properti }}</td>
                </tr>
            @endforeach
        </table>
    @endisset
</body>
</html>
