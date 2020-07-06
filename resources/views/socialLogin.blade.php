<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/asteroid-6.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('icons/education.svg')}}" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    <title>@yield('title')</title>

</head>
<body>
    
    <div class="app">
        <div class="loginBox center">
            <div class="imageDiv">
                <img class="image" src="{{asset('icons/education.svg')}}" alt="image">
            </div>
            <div class="githubDiv m-top20 text-center">
                <a class="bg-darkgray fwhite p-all10 round-br5" href="{{url('/callGithub')}}">
                    <i class="fa fa-github"></i> Login with github
                </a>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{asset('js/axios.js')}}"></script>
<script type="text/javascript" src="{{asset('js/asteroidalert-1.js')}}"></script>
</body>
</html>