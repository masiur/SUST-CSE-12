<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Masiur Rahman Siddiki">
    <meta name="keywords" content="Official Site, SUST CSE 21th Batch, CSE SUST, SUST CSE 2012, CSE'12 SUST , Shahjalal University of section & Technology,
    Department of Computer Science & Engineering, Sylhet-3114, Bangladesh" />
    <meta name ="description" content="This is the official site of 2012 (21st) Batch,Department of Computer Science & Engineering, Shahjalal University of Science & Technology, Sylhet-3114, Bangladesh" />


    <title>CSE 2012 | Shahjalal University of section & Technology</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <!-- Core Developer:
    Masiur Rahman Siddiki
    mrsiddiki AT gmail DOT com
    CSE'12, SUST.

    Last Update: 9:07 PM
Monday, April 12, 2021 (GMT+6)
Time in Khulia Para, Sylhet

    Developers: 

    Abu Hanife Nayeem
    simplenayem AT gmail DOT com
    CSE'12, SUST.

    && 

    Md. Abu Talha
    talhaqc AT gmail DOT com
    CSE'12, SUST. -->

    <style>
        .carousel-item {
            height: 100vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .carousel-caption {
            bottom: 270px;
        }

        .carousel-caption h5 {
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 25px;
        }

        .carousel-caption p {
            width: 75%;
            margin: auto;
            font-size: 18px;
            line-height: 1.9;
        }

        .navbar-light .navbar-brand {
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
            color: #051cb7;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #000000;
        }

        .navbar-toggler {
            background: #ffffff;
        }

        .navbar-nav {
            text-align: center;
            font-weight: bold;
        }

        .nav-link {
            padding: .2rem 1rem;
        }

        .nav-link.active,.nav-link:focus{
            color: #051cb7;
        }

        .navbar-toggler {
            padding: 1px 5px;
            font-size: 18px;
            line-height: 0.3;
        }

        .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
            color: #051cb7;
        }



    </style>

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img class="img-responsive" src="{{ asset('logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="http://souvenir.sustcse12.xyz/" title="The Last Canvas">Souvenir</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Services</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Contact</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>

<div class="">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/../img/slider1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to , SUST CSE 2012 Batch</h5>
                    {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>--}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/../img/slider2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    {{--                <h5>Journey Began at 2013</h5>--}}
                    {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>--}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/../img/slider3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Journey Began at 2013</h5>
                    {{--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>--}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/../img/slider4.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/../img/slider5.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <!-- Thanks to this page https://www.codingflicks.com/2020/07/navigation-bar-with-slider-using-html-css-bootstrap4.html -->

    </div>
</div>


<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="row">
            <div class="float-left col col-sm-4 px-4">
                <span class="text-muted"> &copy;2013-{{ Date('Y') }} Twelve Batch.</span>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="float-right col col-sm-4">
                <span class="float-right text-muted ">Made With <i class="fa fa-heart" style="color: #d9462e"></i> By <a href="{{ route('credit') }}">Us</a></span>
            </div>

        </div>

    </div>
</footer>

</body>
</html>