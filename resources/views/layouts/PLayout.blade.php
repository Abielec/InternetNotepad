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
    @stack('styles')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="{{route('Blog')}}">Trzymaj życie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Blog')}}">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('UserInformation')}}">Profil </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Eated')}}">Zjedz coś</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('PLista')}}">Produkty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('add')}}">Dodaj produkt</a>
                    </li>
                </ul>
            </div>
            </nav>        
        @yield('content')
        <footer >
            <!--Copyright-->
            <div class="text-center">
                © 2018 Copyright:
                Bielec Adrian
            </div>
            <!--/.Copyright-->
        
        </footer>
        @stack('scripts')
    </body>
</html>