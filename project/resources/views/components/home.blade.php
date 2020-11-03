@extends('home')
@section('content')
    @isset($user_login)
        Welcome, {{ $user_login }}
    @endisset
    @isset($data_properti)
        <table border="1">
            @php
            $count=count($data_properti)-1;
            $temp = 0;
            @endphp
            @foreach ($data_properti as $item)
            @if ($temp %4 == 0)
                <tr>
            @endif
                <td>
                    <a href="/pesan/{{$item->id_properti}}"><img src="{{$item->view_properti}}" alt="Image placeholder" class="img-fluid rounded" style="width: 220px; height: 160px;"> </a><br>
                    <h3><a href="/pesan/{{$item->id_properti}}">
                    Rp 
                    {{$item->harga_properti}},00</a></h3><br>
                    {{$item->alamat_properti}} <br>
                    <i>{{$item->deskripsi_properti}}</i>  <br>
                </td>

            @if ($temp %4 == 3 && $count > 0)
                </tr>
            @endif
            @if ($count == 0)
                </tr>
            @endif

            @php
                $count--;
                $temp++;
            @endphp
            @endforeach
        </table>
    @endisset
@endsection
