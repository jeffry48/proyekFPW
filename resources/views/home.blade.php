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
            height: 72vh;
        }
        .footer{
            width: 99vw;
            height: 10vh;
            background-color: lightgreen;
        }
        .copyright{
            font-size: 24pt;
            float: left;
        }
        .noTelp{
            float: right;
            text-align: right;
            font-size: 18pt;
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
            overflow: auto;
            position: relative;
        }
        .backgroundImg{
            width: 100%;
            height: 100%;
            /* background-image: url("hotel.jpg"); */
            background-image: linear-gradient(to bottom,  rgba(0, 0, 0, 0.52), rgba(255, 255, 255, 1)), url('hotel.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            position: absolute;
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
            font-size: 18pt;
            text-align: center;
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

    <div class="content">
        <div class="contentText">
            <div class="backgroundImg"></div>
            <div class="contentHeader">
                Ziperto, website untuk mencari Real estate yang anda perlukan
            </div>
            <div class="contentTextInner">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Commodi odio inventore suscipit, quis rerum ad unde quisquam eveniet ut perspiciatis. Harum.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ea quaerat,
                architecto aperiam fugit neque provident quisquam.
            </div>

        </div>
    </div>

    <div class="footer">
        <div class="copyright">

        </div>
        <div class="noTelp">

        </div>
    </div>
</body>
</html>
