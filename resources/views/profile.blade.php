<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CSE 2012">
    <meta name="keywords" content="Official Site of SUST CSE 21th Batch, CSE SUST, SUST CSE 2012, CSE'12 SUST , Shahjalal University of section & Technology" />
    <meta name ="description" content="2012 Batch,Department of Computer Science & Engineering, Shahjalal University of Science & Technology, Sylhet-3114, Bangladesh" />

    <style type="text/css">
        .custom-round-image {
            max-width: 68% !important;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="up/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="up/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="up/assets/ionicon/css/ionicons.min.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700" rel="stylesheet">

    <!-- Owl Carousel Assets -->
    <!-- <link rel="stylesheet" href="up/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="up/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="up/assets/css/owl.theme.default.min.css"> -->

    <!-- Custom  Design assets -->
    <link rel="stylesheet" type="text/css" href="up/assets/css/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="up/assets/css/media.css"> -->
    <title>SUST CSE 2012 Batch Official Site</title>
    
    <!-- Core Developer: Masiur Rahman Siddiki 
    mrsiddiki AT gmail DOT com
    CSE'12, SUST.

    Developers: 

    Abu Hanife Nayeem
    simplenayem AT gmail DOT com
    CSE'12, SUST.

    && 

    Md. Abu Talha
    talhaqc AT gmail DOT com
    CSE'12, SUST. -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113509671-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-113509671-1');
    </script>


</head>
<body>

    <section class="page-head">
        <div class="container-fulid">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="up/assets/img/cse12.PNG">
                </div>
                <div class="col-md-6 text-right" style="padding-top: 1%;padding-right: 7%;">
                        <a class="btn btn-success" href="{{ route('home') }}"> Home</a>
                        <a class="btn btn-success active" href="{{ route('we') }}"> Profile</a>
                        <a class="btn btn-success" href="http://souvenir.sustcse12.xyz/"> Souvenir</a>
                </div>
            </div>
        </div>
    </section>
    <section style="padding-top:80px">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6"> <!-- first column --> -->
                    <div class="row">
                        @foreach($users as $user)
                        <div class="col-md-3">
                            <a href="{{ route('cvProfile', $user->username) }}"><img class="img-responsive img-circle custom-round-image" src="{{ asset($user->profile->img_url) }}">
                            
                            </a> 
                            {{ $user->profile->name }}<br>
                            {{ $user->email }}                       
                        </div>
                        @endforeach
                        
                        
                        
                    </div>
                <!-- </div> -->
                <!-- <div class="col-md-6"> 
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
    
        
    </section>

    <footer style="height: 100%">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <span class="copyright-text">2016-{{ Date('Y') }} &copy CSE'12. All Rights Reserved.</span>
                </div>
                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="social-icons">
                        <a href="#" class="social-link fb">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-link twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </footer>
    <!-- footer ends -->


<script type="text/javascript" src="up/assets/js/jquery-3.1.1.min.js" ></script>
<script src="up/assets/js/bootstrap.min.js"></script>
<!-- Carousel script file -->

<!-- <script src="up/assets/js/owl.carousel.min.js"></script> -->
<!-- Custom script file -->
<script type="text/javascript" src="up/assets/js/main.js" ></script>


</body>
</html>