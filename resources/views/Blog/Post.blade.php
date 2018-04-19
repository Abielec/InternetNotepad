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
        background-image: url("../img/baner.jpg");
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
    .row {
        display:flex;
        justify-content: center;
        padding:10px;
    }
    #UpArrow
    {
        position:fixed;
        right:55px;
        bottom:34px;
        font-size:4rem;
    }
    #UpArrow:hover
    {

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
            @php
            $Post = DB::table('blog_posts')
             ->select('Title','Image','content')
             ->where('PostId','=',"$id")
             ->first();
         @endphp
         <div class="container" style="margin-top:3rem;" id="Top">
             <a href="{{ url()->previous() }}">Poprzednia strona</a>
             <div class="row">
            <div class="col-md-6 Img-Container">
                <img src="{{asset('storage/'.$Post->Image)}}" class="img-fluid">
            </div>       
        </div>      
            <div class="row article">
             <div class="col-md-10">
                 <h2 class="text-center">{{$Post->Title}}</h2>
                 <p class="lead">@php echo $Post->content @endphp</p>
             </div>
             </div>
         </div>
         <a href="#Top">
             <div id="UpArrow">
                &uarr;
         </div></a>
    </main>

@endsection
