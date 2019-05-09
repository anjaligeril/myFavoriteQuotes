<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>

            html, body {


                font-family: "Playfair Display", Georgia, serif;
                font-weight: 200;
                height: 100%;
                width:100%;
                margin: 0;
                background-size: 100% 100%;

            }

            .navbar-brand{
                font-size:30px;
                color:white !important;
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




            /* On hover, the links will turn white */
            .navbar-nav li a:hover {
                color: #fff !important;
            }


            /* Remove border color from the collapsible button */
            .navbar-default .navbar-toggle {
                border-color: transparent;
            }


            .links ul li a {
                color: white !important;
                padding: 0 25px;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                margin-top: 10px !important;

            }

            .carousel-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(40%); /* make all photos black and white */
                width: 100%; /* Set width to 100% */
                margin: auto;
                height:600px !important;
            }

            .carousel-caption h3 {
                color: #fff !important;
            }

            @media (max-width: 600px) {
                .carousel-caption {
                    display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
                }
                .carousel-inner img {
                    -webkit-filter: grayscale(90%);
                    filter: grayscale(40%); /* make all photos black and white */
                    width: 100%; /* Set width to 100% */
                    margin: auto;

                }
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

        </style>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
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


                @if (Route::has('login'))
                    <div class=" links">
                        <ul class="nav navbar-nav navbar-right">
                        @auth
                          <li><a href="{{ url('/home') }} " >Home</a></li>
                        @else
                           <li><a href="{{ route('login') }} " >Login</a></li>

                            @if (Route::has('register'))
                              <li> <a href="{{ route('register') }}" >Register</a></li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="/images/background.jpg" alt="Los Angeles"  class=" ">
                <div class="carousel-caption">
                    <h3>“As long as everybody is videotaping everybody else, justice will be done.”</h3>

                </div>
            </div>

            <div class="item">
                <img src="/images/backgraound1.jpg" alt="Chicago"   class="">
                <div class="carousel-caption">
                    <h3>Sheldon: "That's no reason to cry. One cries because one is sad. For example, I cry because others are stupid, and that makes me sad."</h3>

                </div>
            </div>

            <div class="item">
                <img src="/images/background2.jpg" alt="New york"  class=" ">
                <div class="carousel-caption">
                    <h3>“Any man who must say, ‘I am the king,’ is no true king. I’ll make sure you understand that when I’ve won your war for you.”</h3>

                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <footer class="text-center">
                <p>My Favorite Quotes from TV Shows </p>
    </footer>
    </body>
</html>
