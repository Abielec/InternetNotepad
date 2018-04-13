@extends('layouts.PLayout')
@section('content')
<a href="{{ url("/") }}/Produkty" style="right:20px;top:20px;position:absolute;">Wróć do poprzedniej strony</a>
 
<div class="container-fluid" style="text-align:center;display:flex;align-items:center;justify-content:center;height:100vh;overflow:hidden;">
    
    <form method="POST" action="{{ route('add')}}">
        <h1>Dodaj produkt</h1>
        @if($errors->any())
                <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                        @endforeach
                </ul>
        @endif
        @csrf
    <fieldset>
        <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="ProductName">Nazwa Produktu</label>
                        <input type="text" required class="form-control" id="ProductName" name="ProductName" placeholder="np. Jabłko"/>
                </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="Calories" class="col-sm-12 col-form-label">Liczba kalorii na 100g</label>
                        <input type="number" step=0.1 min=0 value=0 required class="form-control" id="Calories" name="Calories" />
                </div>
                <div class="form-group col-md-4">
                        <label for="Carbohydrates" class="col-sm-12 col-form-label">Podaj węglowodany produktu</label>
                        <input type="number" step=0.1 min=0 value=0 required id="Carbohydrates" name="Carbohydrates" class="form-control"/>
                </div>
                <div class="form-group col-md-4">
                        <label for="Fats" class="col-sm-12 col-form-label">Podaj ilość tłuszczów produktu</label>
                        <input type="number" step=0.1 min=0 value=0 required class="form-control" id="Fats" name="Fats"/>
                </div>
                <div class="form-group col-md-4">
                        <label for="Proteins" class="col-sm-12 col-form-label">Podaj ilość białka produktu</label>
                        <input type="number" step=0.1 min=0 value=0 required class="form-control" id="Proteins" name="Proteins"/>
                </div>
                <div class="form-group col-md-4">
                        <label for="Roughages" class="col-sm-12 col-form-label">Podaj ilość błonnika produktu</label>
                        <input type="number" step=0.1 min=0 value=0  required class="form-control" id="Roughages" name="Roughages" />
                </div>
                <div class="form-group col-md-4">
                        <label for="Vitamins" class="col-sm-12 col-form-label">Witaminy produktu</label>
                        <input type="text" step=0.1 min=0 required class="form-control" id="Vitamins" name="Vitamins"/>
                </div>
                <div class="form-group col-md-4">
                        <label for="Category" class="col-sm-12 col-form-label">Podaj kategorie produktu</label>
                        <select style="width:100%;" id="Category" class="form-control" name="Category">
                                        @php
                                        $Categories = DB::table('categories')
                                         ->select('CategoryName','id')
                                         ->get();
                                        foreach($Categories as $Category)
                                                echo '<option value="'.$Category->id.'">'.$Category->CategoryName.'</option>';
                                 @endphp
                        </select>
                </div>
                <div class="form-group col-md-4">
                        <label for="Description" class="col-sm-12 col-form-label">Podaj opis produktu</label>
                        <textarea style="width:100%;" id="Description" class="form-control" name="Description" value=0></textarea>
                </div>
        </div>
        
        <!--
           
                   
                      
                                
                        
                                <label for="Vitamins" class="col-sm-2 col-form-label">Witaminy produktu</label>
                                <div class="col-sm-10">
                                        <input type="text" step=0.1 min=0 required class="form-control" id="Vitamins" name="Vitamins"/>
                                </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Category" class="col-sm-2 col-form-label">Podaj kategorie produktu</label>
                                        <div class="col-sm-10">
                                                <select style="width:100%;" id="Category" class="form-control" name="Category">
                                                                @php
                                                                $Categories = DB::table('categories')
                                                                 ->select('CategoryName','id')
                                                                 ->get();
                                                                foreach($Categories as $Category)
                                                                        echo '<option value="'.$Category->id.'">'.$Category->CategoryName.'</option>';
                                                         @endphp
                                                </select>
                                        </div>
                                        </div>
                                <div class="form-group row">
                                        <label for="Description" class="col-sm-2 col-form-label">Podaj opis produktu</label>
                                        <div class="col-sm-10">
                                                <textarea style="width:100%;" id="Description" class="form-control" name="Description" value=0></textarea>
                                        </div>
                                        </div>
                                -->
            <input type="submit" value="Wyślij" class="btn btn-primary"/>
    </fieldset>
</form>
</div>
@endsection