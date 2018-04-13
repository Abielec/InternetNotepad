@extends('layouts.PLayout')
@section('content')
<div class="container">
    
    <div style="height:100vh;align-items:center;display:flex;justify-content:center;">
            @if($errors->any())
            <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                    @endforeach
            </ul>
    @endif
        <form method="POST" action="{{ route('DoEated') }}">
            @csrf
            <h1 style="text-align:center;">Dodaj produkt który dzisiaj zjadłeś</h1>
            <h3 style="text-align:center;"><a href="{{ route('PLista') }} ">Lista produktów</a></h3>
            <div class="form-group"> 
                <input type="hidden" value="{{ Auth::user()->id }}" name="EatedBy" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="EatedProduct" class="col-sm-12 col-form-label">Podaj jaki produkt zjadłeś</label>
                        <input type="text" name="EatedProduct" id="EatedProduct" required class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="EatedWeight" class="col-sm-12 col-form-label">Waga zjedzonego produktu<sub> (g)</sub></label>
                        <input type="number"  name="EatedWeight" class="form-control" id="EatedWeight" required/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="EatedDate" class="col-sm-12 col-form-label">Dzień zjedzenia produtu</label>
                        <input type="date" required name="EatedDate" class="form-control" id="EatedDate" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="EatedAbout" class="col-sm-12 col-form-label">O której godzinie</label>
                        <input type="time" required name="EatedAbout" class="form-control" id="EatedAbout" />
                    </div>    
                </div>
                <input type="submit" class="btn btn-primary" value="Wyślij" style="display:block;margin-left:auto;margin-right:auto;"/>
            </div>
        </form>
        
    </div>
</div>
<script>
function SetDefaultDate() // Set today as default date
{
    let Today = new Date();
    let Day = Today.getDate();
    let Month = Today.getMonth()+1;
    let Year = Today.getFullYear();
    let Hour = Today.getHours();
    let Minute = Today.getMinutes();
    if(Hour<10)
     Hour = "0"+Hour;
    if(Minute<10)
     Minute="0"+Minute;
    if(Day<10)
     Day = "0"+Day;
    if(Month<10)
      Month ="0"+Month;
    let TodayDate = Year+"-"+Month+"-"+Day;
    let ActualTime = Hour+":"+Minute;
    document.getElementById("EatedDate").value = TodayDate;
    document.getElementById("EatedAbout").value = ActualTime;
}
SetDefaultDate();
</script>
@endsection