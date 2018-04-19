@extends('layouts.PLayout')
@section('content')
<div class="container-fluid" style="margin-top:40px;">
    @php
        $ID = Auth::user()->id;
        $Products = DB::table('eatens')
            ->select('eatens.EatedProduct','eatens.EatedAbout','eatens.EatedWeight','eatens.EatedDate','make_products.Calories','make_products.Carbohydrates','make_products.Fats','make_products.ProductName','make_products.Proteins','make_products.Roughages','make_products.Vitamins','categories.CategoryName')
            ->join('make_products','make_products.id','=','eatens.EatedProduct')
            ->join('users','users.id','=','eatens.EatedBy')
            ->join('categories','categories.id','=','make_products.Category')
            ->where('users.id','=',"$ID")
            ->get();
    @endphp
    <table class="table">
            <thead>
                <tr>
                    <td>Nazwa produktu</td>
                    <td>Kalorie<sub><small>na 100g</small></sub></td>
                    <td>Węglowodany<sub><small>na 100g</small></sub></td>
                    <td>Tłuszcze<sub><small>na 100g</small></sub></td>
                    <td>Białko<sub><small>na 100g</small></sub></td>
                    <td>Błonnik<sub><small>na 100g</small></sub></td>
                    <td>Zjedzony o:</td>
                    <td>Kiedy zjedzony</td>
                    <td>Zjedzona ilość<sub>g</sub></td>
                    <td>Kategoria</td>

                </tr>
        </thead>
        <tbody>
            @foreach($Products as $Product)
                <tr>
                    <td>{{ $Product->ProductName }}</td>
                    <td>{{ $Product->Calories }}<sub>kcal</sub></td>
                    <td>{{ $Product->Carbohydrates }}<sub>g</sub></td>
                    <td>{{ $Product->Fats }}<sub>g</sub></td>
                    <td>{{ $Product->Proteins }}<sub>g</sub></td>
                    <td>{{ $Product->Roughages }}<sub>g</sub></td>
                    <td>{{ $Product->EatedAbout }}</td>
                    <td>{{ $Product->EatedDate }}</td>
                    <td>{{ $Product->EatedWeight }}</td>
                    <td>{{ $Product->CategoryName }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection