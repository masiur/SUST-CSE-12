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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="http://souvenir.sustcse12.xyz/" title="The Last Canvas">Souvenir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Begin page content -->

<div class="container marketing">

    <div>
        <br><br>
        <br><br>
        <div class=" row ">
            <div class="col-md-8 offset-md-2 justify-content-center">
                <h4 class="lead text-justify" >We are 21st Batch, 2012-13 Session from Department of Computer Science & Engineering at Shahjalal University of Science and Technology,
                    Sylhet, Bangladesh. Our journey started from the very 1st day of the year 2013 to October 2017. During this astounding journey of near five years,
                    we have gathered memories, friendship, love, and passion to carry on the recognition SUST CSE has. Life here enabled us to accumulate skills to make a
                    stand in the global technology industry, and that is what we are doing. In Bangladesh and several other continents, we are making our name through hard work,
                    dedication, and collaboration. The legacy of SUST CSE is a little bit shiner with us and we are proud to be a part of it. </h4>
                <!-- This about us content is generated by Jahid Hasan Polash -->
            </div>
        </div>

        <br><br>
        <h2 class="text-center">... Around The World <i class="fas fa-globe" style="color: dodgerblue" aria-hidden="true"></i> </h2>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><i class="fa fa-map-marker" style="color: #a50808"></i> </th>
                <th scope="col">Amount of Us Living there</th>
            </tr>
            </thead>
            <tbody>
            <?php $counter = 1; ?>
            @foreach($countrylivings as $row)
                <tr>
                    <th scope="row">{{ $counter++ }}</th>
                    <td>{{ $row->country }}</td>
                    <td>{{ $row->amount }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>

        <h2 class="text-center">Testimonials
            <span style="font-size: 7pt">From <a target="_blank" href="{{ asset('TheLastCanvas.pdf') }}" title="Souvenir">The Last Canvas</a></span>
        </h2>

    </div>


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-9 order-md-2">
            <h3 class="featurette-heading">চিরসবুজ শুভকামনা ~ <span class="text-muted"> ড. মুহম্মদ জাফর ইকবাল</span></h3>
            <p class="lead">সি.এস.ই ২০১২ সালের ছেলেমেয়েরা পাশ করে চলে যাচ্ছে - বিষয়টি একদিন থেকে আনন্দের - তারা ছাত্রজীবন শেষ করে আনন্দময় কর্ম জীবনে প্রবেশ করতে যাচ্ছে।
                আবার এটা অস্বীকার করার উপায় নেই যে জীবনের সবচেয়ে আনন্দময় সময়টুকু হচ্ছে ছাত্রজীবন! সেই জীবন শেষ হয়ে যাচ্ছে সে জন্যে তাদের জন্যে একটুখানি সমবেদনা।</p>
        </div>
        <div class="col-md-3 order-md-1">
            <img src="{{ asset('photos/zafar_sir.jpg') }}" class="rounded-circle img-responsive" style="width: 185px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-9 order-md-1">
            <h3 class="featurette-heading">Au Revoir ~ <span class="text-muted">Yasmeen Haque</span></h3>
            <p class="lead">Wishing all the students of the batch 12 CSE department the best of luck. I look forward to each and every student to be ambassadors of SUST.
                I am sure they will flourish and always remember their department and SUST.<br>
                I pray for everyone succeeding in life and being happy.</p>

        </div>
        <div class="col-md-3 order-md-2">
            <img src="{{ asset('photos/yasmeen_mam.jpg') }}" class="rounded-circle img-responsive" style="width: 185px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-9 order-md-2">
            <h3 class="featurette-heading">Words from ~ <span class="text-muted">M. Jahirul Islam </span></h3>
            <p class="lead">It is really nice to hear that CSE' 12 batch is going to publish a souvenir on the eve of their journey at SUST.

                I had a great experience with them both in class and out of the classes. The whole batch amazed me a lot.
                In my 20 years of teaching experience both at SUST and abroad, this batch is one of the best batches in life.
                I am confident that all of them will do great in my their respective field in future.
                Usually, in every batch we find few students are doing great in terms of everything.
                This batch is totally different. Almost all of them are awesome as a human being. I am so proud of you all. I wish your very good luck.
                <br>
                But, I cannot forget one tragic event that happened in that batch. Yes, I am talking about Niloy Md Azam. He was one of my favorite students.
                He drowned in the university pond. I was the acting Head on that day and I had to inform his parents about this accident.
                That was the most tragic day in my life and nobody can feel it until you go through it. May Allah forgive him and grant him Jannah.<br>

                At last, I would say to my dear students, keep doing the good deeds.</p>
        </div>
        <div class="col-md-3 order-md-1">
            <img src="{{ asset('photos/jahir_sir.jpg') }}" class="rounded-circle img-responsive" style="width: 185px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-9 order-md-1">
            <h3 class="featurette-heading">... <span class="text-muted"> মেহরুবা শারমিন চৌধুরী</span></h3>
            <p class="lead">আমি কি আর লিখতে জানি, কবু লিখতে হচ্ছে। নতুন করে সুভেনির বের হচ্ছে, বের করেছে ২০১২ ব্যাচ। তাদের সব কিছুতেই আগ্রহ, সব কিছুতেই নতুনত্ব।
                এই সেদিন, চলে যাওয়ার কিছুদিন আগেও রক্তদান কর্মসূচীতে তাদের নেতৃত্ব-মুগ্ধ করে আমাদের। শুধু কি তাই?<br>
                সব ব্যাচই কিছু না কিছু করে, ওরাও করেছে। তার উপর সব শিক্ষকের প্রতি ওদের শ্রদ্ধাবোধও একটু বেশি। আমি ওদের দুটি কোর্স নিয়েছি।
                কোন শিক্ষক মাইক্রোসেসর নিতে চাইল না দেখে ওটা এসে পড়লাে আমার ঘাড়ে মিটিং এ অনুপস্থিত থাকার অপরাধে।
                ছাত্র জীবনে এই কোর্স আমারও ভাল লাগত না। বুয়েটের একজন শিক্ষক আমাদের পড়াতেন। কেউ বুঝত না, কিন্তু মুখ চোখে স্তাকিয়ে থাকত কারন স্যার খুব সুদর্শন ছিলেন।
                কোর্সটিতে আমি ওদের গিনিপিফ বানিয়েছি আর মনে মনে ভেবেছি -"আহা, আমি ওদের মনের মত করে পড়াতেও পারছি মা, আবার আমি স্যারের মতও নই যে ওরা আমার পড়ায় মুগ্ধ হয়ে তাকিয়ে থাকৰে।"
                তবুও তারা মুগ্ধ হয়ে তাকিয়ে থাকার অভিনয় করে, আমাকে হতাশ করে না। তবে আগের কোর্সটা ভাল পড়িয়েছিলাম বলেই হয়ত "কোন টিচারের পড়া তোমাদের ভাল লাগে- সেই অনুযায়ী রেটিং কর" এ ধরনের
                একটা রেটিএ ২-৪ এর মধ্যে রেখেছিল আমাকে ৮০% ছাত্র-ছাত্রী। এতোগুলো সেমিস্টারে এতে শিক্ষকের মধ্যে আমার স্থান ২-৪। কম? উহু। অনেক সম্মানিত স্যারের ও উপরে। এটা কি এমনি এমনি এসেছে? ওরা আমাকে দিয়েছে তাই আমিও দেবার চেষ্টা করেছি।</p>
        </div>
        <div class="col-md-3 order-md-2">
            <img src="{{ asset('photos/mehruba_mam.jpg') }}" class="rounded-circle img-responsive" style="width: 185px;">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div>






<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="row">
            <div class="float-left col col-sm-4">
                <span class="text-muted"> &copy;2013-{{ Date('Y') }} Twelve Batch.</span>
            </div>
            <div class="col"></div>
            <div class="float-right col col-sm-4">
                <span class="float-right text-muted ">Made With <i class="fa fa-heart" style="color: #d9462e"></i> By <a href="{{ route('credit') }}">Us</a></span>
            </div>

        </div>

    </div>
</footer>

</body>
</html>