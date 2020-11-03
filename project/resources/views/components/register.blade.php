@extends('home')
@section('content')
<form action="/regCheck" method="post">
    @csrf
        <input class="input100" type="text" name="name" placeholder="Full Name"><br>
    @error('name')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

        <input class="input100" type="text" name="email" placeholder="E-mail"><br>
    @error('email')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

        <input class="input100" type="text" name="phone" placeholder="Phone Number"><br>
    @error('phone')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror
    
        <input class="input100" type="text" name="username" placeholder="Username"><br>
    @error('username')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

        <input class="input100" type="text" name="pass" placeholder="Password"><br>
    @error('pass')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

        <input class="input100" type="password" name="repass" placeholder="Re-enter Password"><br>
    @error('repass')
    <div style="color:red; font-weight:bold"> {{$message}}</div>
    @enderror

    <div class="container-login100-form-btn p-t-13 p-b-23">
        <input type="submit" class="login100-form-btn" value="Sign Up">
    </div>


</form>
@endsection