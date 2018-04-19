@extends('layouts.PLayout')
@push('styles')
<style>
    body,html
    {
    margin:0;
    padding:0;
    
    }
    body{
        z-index:-2;
    }
    #Baner
    {
        width:100vw;
        max-width:100%;
        overflow: hidden;
        display:flex;
        align-items:center;
        justify-content: center;
        height:55vh;
        position: relative;
        box-shadow:3px 3px 13px rgba(0,0,0,0.5);
    }
    #Baner h1
    {
        color:white;
        letter-spacing: 2px;
        text-align: center;
        text-shadow:4px 1px 8px black;
    }
    #Baner h2
    {
        margin:0;
        margin-top:2rem;
        color:white;
        border:3px solid white;
        padding:10px;
    }
    #Baner::after
    {
        content:'';
        display:block;
        position: absolute;
        z-index:-1;
        top:0;
        left:0;
        background-image: url("img/baner.jpg");
        background-size:cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        filter: blur(7px) grayscale(30%) contrast(120%) brightness(60%);
        transform: scale(1.1);
        width:100%;
        max-width:100%;
        overflow: hidden;
        height:55vh;
    }
    #Menu ul
    {
        margin:0;
        padding:0;
        width:100%;
        display:flex;
        flex-direction: row;
    }
    h2 a
    {
        color:black;
    }
    h2 a:hover{
        color:black;
        text-decoration: none;
    }
    #Menu ul li{
        list-style:none;
        padding:10px;
    }
    #Menu ul li a
    {
        color: black;
        text-decoration: none;
    }
    .article .col-md-5 img
    {
        display: block;
        margin-left:auto;
        margin-right:auto;
    }
    .Img-Container
    {
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .Img-Container img
    {
        box-shadow:0 0 10px black;
    }
    .divider
    {
        margin:5rem;
    }
    </style>
@endpush
@section('content')
    <header id="Baner">
            <div>
                <h1>Otyłość a może</h1>
                <h2 class="shadow p-3 mb-5 rounded">Danse macabre XXI w</h2>
            </div>
        </header>
    <main>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <div class="row">
                    <div class="col">
                        <h1 class="display-4">O projekcie</h1>
                        <p class="lead">Projekt jest tworzony w celach edukacyjnych, tak samo socjalnie jak i dotyczy konkretnych dziedzin takich jak: informatyka,dietetyka,socjologia.</p>
                    </div>
                    <div class="col">
                        <h1 class="display-4">Cele projektu</h1>
                        <p class="lead">
                            Rozwinięcie kreatywności, oraz umiejętności programowania,<br />
                            Nauka języka angielskiego,<br />
                            Uświadomienie co się dzieje z organizmem.
                        </p>

                        
                    </div>
                    <div class="col">
                            <h1 class="display-4">O autorze</h1>
                            <p class="lead">Mam 18lat, pochodzę z Lublina uczę się w technikum informatycznym. Po więcej informacji zapraszam <a href="http://bielec-adrian.pl/Portfolio">tu.</a></p>
                        </div>
                </div>
            </div>
        </div>
        <div class="container">
            @foreach($Posts as $Post)
            <div class="row article">
            <div class="col-md-7">
                <h2 class="text-center"><a href="post/{{ $Post->PostId }}">{{$Post->Title}}</a></h2>
            <p class="lead">{{ str_limit(strip_tags($Post->content),400) }}
            @if (strlen(strip_tags($Post->content)) > 400) <a href="post/{{ $Post->PostId }}">Czytaj dalej</a> @endif</p>
            </div>
            <div class="col-md-5 Img-Container">
                    <img src="{{asset('storage/'.$Post->Image)}}" class="img-fluid">
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="lead text-muted">
                    {{ MonthsToPL($Post->created_at->format('M'))." ".$Post->created_at->format('j, Y') }}
                    </p>
                </div>
            </div>
            @if(!$loop->last)
            <hr class="divider">
            @endif
            @endforeach
            <div style="display:flex;justify-content:center;">
            {{ $Posts->links() }}
            </div>
        </div>
    </main>
@endsection
