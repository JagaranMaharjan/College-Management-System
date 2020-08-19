<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', $title)</title>
    <link rel="stylesheet" href="{{url("public/lib/bootstrap/css/bootstrap.css")}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>College Management System</h1>
            <br>
            <a href="{{route('welcome')}}">Welcome</a>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('about')}}">About Us</a>
            <a href="{{route('contact')}}">Contact</a>
            <hr>
        </div>
        @yield('content')
    </div>
</body>
</html>
