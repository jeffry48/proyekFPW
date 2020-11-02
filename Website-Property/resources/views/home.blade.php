<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('includes.header') <br>
    <div style="background-color: lightyellow; position: static">
    @yield('content')
    </div>
    @include('includes.footer')
</body>
</html>
