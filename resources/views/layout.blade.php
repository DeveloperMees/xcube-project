<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=/, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>x-cube.bkm.nl</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand" href="{{route('home')}}">X-Corp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('support')}}">Support</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @else
                @hasrole('admin')
                <li class="nav-item">
                    <a class="nav-link text-white btn disabled" href="{{route('admin.dashboard')}}">{{auth::user()->name}}</a>
                </li>
                <li class="nav-item disabled">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                @endhasrole
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout')}}</a>
                </li>
                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    <footer class="footer w-100">
        <div class="footer-copyright text-center text-white py-3 bg-dark">© 2021 Copyright<a href="https://www.x-cube.nl/" target="_blank"> X-Corp BV</a>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        @yield('scripts')
    </footer>
</body>

</html>