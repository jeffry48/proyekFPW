<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #navButtons{
            /* margin-right: 5px;
            margin-top: 2px; */
            background-color: lightsalmon;
            border: solid darkgray 1px;
            width: 25%;
            border-radius: 5px;
            font-size: 15pt;
            margin-top: 70px;
        }
        #navButtons:hover{
            background-color: salmon;
            cursor: pointer;
        }
        .logo2{
            width: 20%;
            float: right;
            margin-right: 2%;
            /* background-color: red; */
        }
        .regLogBtn{
            width: 49%;
            height: 30px;
            margin-top: 30px;
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
        /* .footer{
            width: 99vw;
            height: 10vh;
            background-color: lightgreen;
        } */
        /* .copyright{
            font-size: 24pt;
            float: left;
        }
        .noTelp{
            float: right;
            text-align: right;
            font-size: 18pt;
        } */
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
            overflow: auto;
        }
        .backgroundImg{
            width: inherit;
            height: inherit;
            background-image: linear-gradient(to bottom,  rgba(0, 0, 0, 0.52), rgba(255, 255, 255, 1)), url('hotel.jpg');
            background-size: cover;
            background-position: center;
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
            width: 40%;
            height: 100%;
            background-color: brown;
            float: left;
        }
        .contText{
            width: 30%;
            height: 100%;
            float: left;
            /* background-color: yellow; */
        }
        .contInput{
            width: 30%;
            height: 100%;
            float: left;
            /* background-color: cadetblue; */
        }
        .text{
            margin-left: 30%;
            font-size: 16pt;
            margin-top: 5%;
        }
        .input{
            font-size: 16pt;
            margin-top: 5%;
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
        <div class="logo">
            <div class="logo2">
                <button class="regLogBtn" onclick="moveTo('login')">login</button>
                <button class="regLogBtn" onclick="moveTo('register')">register</button>
            </div>
        </div>
        <div class="nav">
            <button name="" id="navButtons" onclick="moveTo('beli')">Beli Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('kontrak')">Kontrak Rumah</button>
            <button name="" id="navButtons" onclick="moveTo('jual')">Jual Rumah</button>
        </div>
    </div>

    <div class="content">
        <div class="contentText">
            <div class="gambarImg"></div>
                <h1>Register</h1>
                <form action="/cekregister" method="POST">
                    @csrf
                    <div class="contText">
                        <div class="text">
                            nama lengkap:
                        </div>
                        <div class="text">
                            no telp:
                        </div>
                        <div class="text">
                            email:
                        </div>
                        <div class="text">
                            username
                        </div>
                        <div class="text">
                            password
                        </div>
                        <div class="text">
                            confirm password
                        </div>
                    </div>
                    <div class="contInput">
                        <input type="text" name="name" id="" class="input">
                        @error('name') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="text" name="phone" id="" class="input">
                        @error('phone') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="text" name="email" id="" class="input">
                        @error('email') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="text" name="username" id="" class="input">
                        @error('username') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="text" name="pass" id="" class="input">
                        @error('pass') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="text" name="repass" id="" class="input"> <br>
                        @error('repass') <br><span style="color: red">{{ $message }}</span> @enderror
                        <input type="submit" value="register" class="registerBtn" style="margin-top: 5%;">
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
