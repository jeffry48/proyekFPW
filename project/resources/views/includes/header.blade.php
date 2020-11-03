<style>
    .header{
        background-color:aqua;
        color:black;
    }
    .button {
        float: right;
    }
    .img{
        top:0;
        left: 0;
     }
    
     h3 {
        font-size: 16px;
        font-weight: 200;
        letter-spacing: 0;
        font-family: "Open Sans";
        font-style: normal;
     }
    p{
        width:100%;
    }
    </style>
    <div class="header" style = "display: inline;position: static">
        <div  style = "float: right">
            <button class="btn"><a href="/218116709">Home</a></button>
            <button class="btn"><a href="/login">Login</a></button>
            <button class="btn"><a href="/register">Register</a></button>
            <button class="btn"><a href="/hotels">Hotel</a></button>
            <button class="btn"><a href = "/logout">Logout</a></button>
            @isset($loggedin)
                <button class="btn"><a href = "/logout">Tes</a></button>
            @endisset
        </div>
    </div>
    