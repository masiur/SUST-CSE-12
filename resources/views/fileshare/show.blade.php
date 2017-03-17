<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }} - SUST CSE 2012 Batch</title>
        <meta name="description" content="Online File Share">
        <meta name="author" content="Masiur">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- {!! Html::style('//fonts.googleapis.com/css580c.css?family=Montserrat|Roboto') !!} --}}

        <!-- Masiur Rahman Siddiki 
        mrsiddiki AT gmail DOT com
        CSE'12, SUST. -->

        {!! Html::style('css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {!! Html::style('assets/css/animate.css') !!}
    </head>
<body style="background-color: lavender">

    <div class="container">
        <h1>File Share Online </h1>
        <h4>Link expires in 15 days. Max size upto 100MB</h4>
        <p>Warning: Generated Links will be dissappeared after page refresh</p>
        <div>
        @if($success = Session::get('success'))
            <!-- <b>{!! $success !!}</b> -->
             
            <h3>Minimize URL for sharing</h3>
            <h3><a href="{{ Session::get('filelink') }}">{{  Session::get('filelink') }}</a></h3>
            <br>
            <h3>Hard Link</h3>
            <h3><a href="{{ Session::get('hardlink') }}">{{ Session::get('hardlink') }}</a></h3>
            <a class="btn btn-success" href="{{ route('file.share') }}">Go Back To Upload Page</a>
        @else
            <a class="btn btn-success" href="{{ route('file.share') }}">Go Back To Upload Page</a>
        @endif
            
            
        </div>
    </div>

</body>
</html>
