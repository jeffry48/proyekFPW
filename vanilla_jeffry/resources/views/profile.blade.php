<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Update Profile</h2>
    {{-- {{dd($user->username_user)}} --}}
    <form action="/updateprofile" method="post">
        @csrf
            <input class="input100" type="text" name="name" placeholder="Full Name" value="{{$user->nama_user}}"><br>
        @error('name')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
    
            <input class="input100" type="text" name="email" placeholder="E-mail" value="{{$user->email_user}}"><br>
        @error('email')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
    
            <input class="input100" type="text" name="phone" placeholder="Phone Number" value="{{$user->no_telp_user}}"><br>
        @error('phone')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
        
            <input class="input100" type="text" name="username" placeholder="Username" value="{{$user->username_user}}"><br>
        @error('username')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
    
            <input class="input100" type="text" name="pass" placeholder="New Password"><br>
        @error('pass')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
    
            <input class="input100" type="password" name="repass" placeholder="Current Password"><br>
        @error('repass')
        <div style="color:red; font-weight:bold"> {{$message}}</div>
        @enderror
    
        <div class="container-login100-form-btn p-t-13 p-b-23">
            <input type="submit" class="login100-form-btn" value="Update">
        </div>
    
    </form>
</body>
</html>