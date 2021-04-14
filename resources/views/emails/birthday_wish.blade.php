<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .responsive {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div>
{{--    Dear <b>{{ $name }}</b>--}}
    <h4>Hi, <i>{{ $name }}</i></h4>
    <p>SUST CSE 2012 remembers you in this very special day of yours.</p>
    <p>Wishing you Many Happy Returns.</p>

    <img class="responsive" alt="Happy Birthday Image" src="{{ asset('uploads/BirthdayCard2.png') }}">
    <br>
    <p>~</p>
    <a href="https://www.sustcse12.xyz"><img alt="SUST CSE Logo Unoff"  src="{{ asset('logo.png') }}"></a>
    <br>
    <a href="https://www.sustcse12.xyz">http://www.sustcse12.xyz</a>
    <p style="font-size: 8pt">P.S. If you would like to unsubscribe from this automated birthday email, please send a mail to <a href="mailto:info@sustcse12.xyz">info@sustcse12.xyz</a></p>
</div>
</body>
</html>
