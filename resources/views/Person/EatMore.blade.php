@extends('layouts.PLayout')
@section('content')
<div class="container text-center" style="display:flex;height:100vh;justify-content:center;align-items:center;">
    <div>
        <h1>Prawidłowo dodano pokarm, do Twojej listy</h1>
        <h3>co chcesz teraz zrobić?</h2>
            <div class="links" style="padding:10px;text-align;center;">
                <a href="{{ route('Eated') }}" style="padding:10px;">Dodać kolejny zjedzony produkt</a>
                <a href="{{ route('add') }}" style="padding:10px;">Dodać produkt do listy produktów</a>
                <a href="{{ route('UserInformation') }}" style="padding:10px;">Powrócić do informacji o użytkowniku</a>
                <a href="{{ route('PLista') }}" style="padding:10px;">Przejść do listy produktów</a>
            </div>
    </div>
</div>
@endsection