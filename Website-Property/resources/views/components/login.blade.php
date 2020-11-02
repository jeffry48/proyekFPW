@extends('home')
@section('content')

<form action="/cekLogin" class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
    @csrf
    <span class="login100-form-title">
        Sign In
    </span><br>

        <input class="input100" type="text" name="username" placeholder="Username"><br>
    @error('username')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

        <input class="input100" type="password" name="pass" placeholder="Password"><br>
    @error('pass')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

    <div class="container-login100-form-btn p-t-13 p-b-23">
        <input type="submit" value="Sign In" class="login100-form-btn">
    </div>

    <div class="flex-col-c p-t-10 p-b-40">
            Don’t have an account?

        <a href="/register" class="txt3">
            Sign up now
        </a>
    </div>
</form>

@isset($username)
    @php
    echo "<script>alert('".$username."')</script>";   
    @endphp
@endisset
@endsection