@extends('layouts.PLayout')
@section('content')
<div class="container text-center" style="display:flex;height:100vh;justify-content:center;align-items:center;">
    <div>
        <h1>Bład, nie znaleziono produktu</h1>
        <h3>Prawdopodobnie twojego produktu nie ma na liście</h2>
            <div class="links" style="padding:10px;text-align;center;">
                <a href="{{ route('add') }}" style="padding:10px;">Dodaj produkt</a>
                <a href="{{ route('UserInformation') }}" style="padding:10px;">Powrót do informacji o użytkowniku</a>
                <a href="{{ route('PLista') }}" style="padding:10px;">Lista produktów</a>
            </div>
    </div>
</div>
@endsection