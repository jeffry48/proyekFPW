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
        .contentText{
            width: 100%;
            height: 100%;
            float:left;
            background-color: white;
        }
        .contentHeader{
            margin-top: 20px;
            font-size: 24pt;
            text-align: center;
        }
        .contentTextInner{
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 12pt;
        }
        .gambarImg{
            width: 10%;
            height: 100%;
            background-color: brown;
            float: left;
        }
        .text{
            margin-left: 100px;
            margin-top: 20px;
            font-size: 16pt;
            width: 20%;
            float: left;
        }
        .input{
            margin-top: 20px;
            font-size: 16pt;
            margin-left: 1%;
            width: 40%;
            float: left;
        }
        .registerBtn{
            width: 70%;
            background-color: lightblue;
            border: solid lightblue 1px;
            border-radius: 10px;
            font-size: 16pt;
        }
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }
    </script>
</head>
<body>
    @if ($errors->any())
        <style>
            .content{
                overflow: auto;
            }
            .gambarImg{
                height: 140%;
            }
        </style>
    @endif
    <div class="header">
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
    </div>

    <div class="content">
        <div class="contentText">

            <div class="gambarImg"></div>
                <h1>Profile</h1>
                <button onclick="moveTo('myProperti')">lihat properti jual</button>
                <button onclick="moveTo('logout')">logout</button>
                <hr>
                <form action="/updateprofile" method="POST">
                    @csrf
                    <div class="text">
                        nama lengkap:
                    </div>
                    <input type="text" name="name" id="" class="input" value="{{$user->nama_user}}"> <br>
                    @error('name')
                        <div class="text" style="color: red">

                        </div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div> <br>
                    @enderror

                    <div class="text">
                        no telp:
                    </div>
                    <input type="text" name="phone" id="" class="input" value="{{$user->no_telp_user}}"> <br>
                    @error('phone')
                        <div class="text" style="color: red">

                        </div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        email:
                    </div>
                    <input type="text" name="email" id="" class="input" value="{{$user->email_user}}"> <br>
                    @error('email')
                        <div class="text" style="color: red">

                        </div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        username
                    </div>
                    <input type="text" name="username" id="" class="input" value="{{$user->username_user}}"> <br>
                    @error('username')
                        <div class="text" style="color: red">

                        </div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        password
                    </div>
                    <input type="password" name="pass" id="" class="input" value="{{$user->password_user}}"> <br>
                    @error('pass')
                        <div class="text" style="color: red">

                        </div>
                        <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        current password
                    </div>
                        <input type="password" name="repass" id="" class="input"> <br>
                    @error('repass')
                    <div class="text" style="color: red">

                    </div>
                    <div style="color:red; font-weight:bold; font-size: 12pt;" class="input">{{$message}}</div><br>
                    @enderror

                    <div class="text">
                        <input type="submit" value="update profile" class="registerBtn">
                    </div>
                </form>

        </div>
    </div>

    {{-- <div class="footer">
        <div class="copyright">

        </div>
        <div class="noTelp">

        </div>
    </div> --}}
</body>
</html>
