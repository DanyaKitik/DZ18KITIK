<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
@csrf
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">
            <ul class="nav" style="">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}"><p type="submit" class="btn btn-primary">HOME</p></a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('link')}}"><p type="submit" class="btn btn-primary">LINK</p>
                        </a>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#"><p type="submit" class="btn btn-secondary">LINK</p></a>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}"><p type="submit" class="btn btn-primary">
                            REGISTER</p></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            @yield('content')
        </div>
        <div class="col-3">
            @guest()
                @error('error')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                @include('login')
                <a href="{{route('register')}}" class="btn btn-primary" style="margin-top: 5px">Register</a>
            @endguest
            @auth()
                <h2>Hi, {{auth()->user()->name}}</h2>
                <a href="{{route('logout')}}"><p type="submit" class="btn btn-primary">Logout</p></a>
            @endauth
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>
