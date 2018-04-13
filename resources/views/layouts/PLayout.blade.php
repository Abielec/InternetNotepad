<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        nav a
        {
            padding:10px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        #PersonalInformation
        {
            margin-right:20px;
        }
        #PersonalInformation tr td
        {
            padding:10px;
            text-align:center;
        }
        #PersonalInformation td{
            border:1px solid rgba(0,0,0,0.4);
        }
    </style>
    </head>
    <body>
        <nav style="position:absolute;top:0;left:0;">
            <a href="{{route('UserInformation')}}">Użytkownik</a>
            <a href="{{route('Eated') }}">Zjedz coś</a>
            <a href="{{route('PLista') }}">Lista produktów</a>
            <a href="{{route('add') }}">Dodaj produkt</a>
        </nav>
        @yield('content')
        <footer >
            <!--Copyright-->
            <div class="text-center" style="position:absolute;bottom:0;width:100%;padding:10px;">
                © 2018 Copyright:
                Bielec Adrian
            </div>
            <!--/.Copyright-->
        
        </footer>
    </body>
</html>