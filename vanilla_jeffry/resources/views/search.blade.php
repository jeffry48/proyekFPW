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
        }
        #rumah,#apartemen,#tanah{
            background-color: white;
        }
        .searchBtn{
            width: 20%;
            font-size: 14pt;
            margin-top: 2%;
        }
    </style>
    <script>
        function moveTo(link){
            window.location.href=link;
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            exdays = exdays || 30; // default to 30 days
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        // function checkCookie() {
            // var rumah = getCookie("cookie");
            // if (rumah != "") {
            // alert("Welcome again " + username);
            // } else {
            //     username = prompt("Please enter your name:", "");
            //     if (username != "" && username != null) {
            //     setCookie("username", username, 365);
            //     }
            // }
        // }

        function deleteCookie(nama){
            document.cookie = nama+"=yes; expires=Thu, 18 Dec 2013 12:00:00 UTC";
            // document.cookie = "apartemen=yes; expires=Thu, 18 Dec 2013 12:00:00 UTC";
            // document.cookie = "tanah=yes; expires=Thu, 18 Dec 2013 12:00:00 UTC";
            // alert("sukses");
        }

        function togglefilter(id){
            // alert(id);
            var button = document.querySelector("#"+id);
            // alert('a');
            if(button.style.backgroundColor=="green"){
                deleteCookie(id);
                // alert(getCookie(id));
                document.getElementById("h"+id).value = "";
                button.style.backgroundColor = "white";
                // if(getCookie(button.innerHTML)!=""){
                // }
            }
            else{
                setCookie(id,"yes");
                // alert(getCookie(id));
                document.getElementById("h"+id).value = "yes";
                button.style.backgroundColor = "green";
                // if(getCookie(button.innerHTML)!=""){
                // }
            }
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
            {{-- <div class="backgroundImg"></div> --}}
            <div class="contentHeader">
                Advance search
                <div style="font-size: 14pt;">
                    input your filters here
                </div>
            </div>

            <div class="contentTextInner">
                <div><button id="rumah" onclick="togglefilter(this.id)">Rumah</button><button id="apartemen" onclick="togglefilter(this.id)">Apartemen</button><button id="tanah" onclick="togglefilter(this.id)">Tanah</button></div>
                <form action="/advancesearchdb" method="post">
                    @csrf
                    <div style="text-align: left">
                        <input type="hidden" name="rumah" id="hrumah" value="">
                        <input type="hidden" name="apartemen" id="hapartemen" value="">
                        <input type="hidden" name="tanah" id="htanah" value="">
                        alamat: <input type="text" name="search" id="searchbar">
                        <div>Range harga <input type="number" name="harga_awal" id=""><input type="number" name="harga_akhir" id=""></div>
                        <div>Jumlah ruangan <input type="number" name="ruangan" id=""></div>
                        <div>Jumlah kamar mandi <input type="number" name="kamarmandi" id=""></div>
                        <input type="submit" value="search" class="searchBtn">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
