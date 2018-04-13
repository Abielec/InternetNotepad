@extends('layouts.PLayout')
@section('content')
    <a href="/fit/public/Produkty" style="float:left;margin:20px;">Strona Główna</a>
    <a href="{{url()->previous() }}" style="float:right;margin:20px;">Wróć do poprzedniej strony</a>
     
    <table class="table">
        <thead>
            <tr>
                <td>Id produktu</td>
                <td>Nazwa produktu</td>
                <td>Kalorie<sub><small>na 100g</small></sub></td>
                <td>Węglowodany<sub><small>na 100g</small></sub></td>
                <td>Tłuszcze<sub><small>na 100g</small></sub></td>
                <td>Białko<sub><small>na 100g</small></sub></td>
                <td>Błonnik<sub><small>na 100g</small></sub></td>
                <td>Witaminy</td>
                <td>Opis</td>
                <td>Kategoria</td>
                @if(Auth::user() && Auth::user()->name == 'Adrian')<td style="text-align:center;">Usuń</td>@endif
            </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
            <tr>
                <td>{{ $Product->id }}</td>
                <td>{{ $Product->ProductName }}</td>
                <td>{{ $Product->Calories }}<sub>kcal</sub></td>
                <td>{{ $Product->Carbohydrates }}<sub>g</sub></td>
                <td>{{ $Product->Fats }}<sub>g</sub></td>
                <td>{{ $Product->Proteins }}<sub>g</sub></td>
                <td>{{ $Product->Roughages }}<sub>g</sub></td>
                <td>{{ $Product->Vitamins }}</td>
                <td>@if($Product->Description ==null) Brak @else {{$Product->Description}} @endif</td>
                <td>
                @php $ProductNames = DB::table('make_products')
                ->join('categories', 'make_products.Category','=','categories.id')
                ->where('make_products.id','=',"$Product->id")
                ->pluck('CategoryName');
                foreach($ProductNames as $ProductName)
                    echo $ProductName;
                @endphp</td>
                @if(Auth::user() && Auth::user()->name == 'Adrian')<td style="text-align:center;"><a href="skasuj/{{$Product->id}}">X</a></td>@endif
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection