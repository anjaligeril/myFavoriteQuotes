<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Styles -->

    <style>

        html, body {

            background-color: #009faf;
            font-family: "Playfair Display", Georgia, serif;
            font-weight: 200;
            height: 100%;
            width:100%;
            margin: 0;
            background-size: 100% 100%;

        }
.addQuotes{
    margin-top: 12px;
}
        .navbar-brand{
            font-size:30px;
            color:white !important;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

main{
    padding-top: 100px;

    background-blend-mode: luminosity;
    background-color: #4dd0e1;
    padding-bottom: 50px;

}
.quotes{
    color:indigo;
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}
.modal-title{
    font-weight: bold;
}
.showHead{
    color:green;
    font-size: 18px;
}
.showContent{
    color:orange;
    font-size: 18px;
    font-weight: bold;

}
.showQuote{
    color:indigo;
    font-size:20px;
    font-weight: bold;
}
    /* Add a dark background color with a little bit see-through */
        .navbar {
            margin-bottom: 0;
            background-color: #009faf;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
            opacity: 0.9;


        }
        .dropdown-menu a{

            color: black !important;
        }


        ul li a{
            color: white !important;
            padding: 0 25px;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: .1rem;
            text-decoration: none !important;
            text-transform: uppercase;
        }
        ul {
            list-style-type: none;
        }
        /* Add a dark background color to the footer */
        footer {
            background-color: #009faf;
            color: #f5f5f5;
            padding: 20px;
        }

        footer a {
            color: #f5f5f5;
        }

        footer a:hover {
            color: #777;
            text-decoration: none;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            padding: 20px;
            text-align: center;
            font-family: arial;
            background-color: white;
            margin-top: 50px;
            border-radius: 10px;
        }
        .cardImage{
            height: 200px;
            width:250px;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        My Favorite Quotes
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav top-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link navLinks" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link navLinks" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="text-center">
            <p>My Favorite Quotes from TV Shows </p>
        </footer>
    </div>
</body>
</html>
