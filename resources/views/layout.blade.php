<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Teet App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >

    <style>
        body {
            background-color: #f8fafc;
        }
        .border {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                Teet App
            </a>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-light">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-light">Signup</a>
                            @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <div>
        @yield('content')
    </div>
</body>
</html>