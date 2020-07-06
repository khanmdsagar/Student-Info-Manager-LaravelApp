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
    <script type="text/javascript" src="{{asset('js/asteroid alert.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body>
    
@include('layouts.menu')
@yield('content')

<script type="text/javascript" src="{{asset('js/axios.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>

</body>
</html>