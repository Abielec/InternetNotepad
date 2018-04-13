@extends('layouts.PLayout')
@section('content')
<div class="container" style="height:100vh;display:flex;align-items:center;justify-content:center;">
        @if($errors->any())
        <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                @endforeach
        </ul>
@endif
<form method="POST" action="{{ route('DoGirts')}}">
        <fieldset>
            <legend style="text-align:center;"><h1>Pomiary ciała</h1></legend>
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="PersonId" />
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="Calf">Łydka</label>
                    <input type="number" min=0  class="form-control" id="Calf" name="Calf"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="Pas">Pas</label>
                    <input type="number" min=0 required class="form-control" id="Pas" name="Pas"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="Waist">Talia</label>
                    <input type="number" min=0 required class="form-control" id="Waist" name="Waist"/>
                </div>
                <div class="form-group col-md-2">
                        <label for="Chest">Klatka piersiowa</label>
                        <input type="number" min=0 required class="form-control" id="Chest" name="Chest"/>
                 </div> 
                 <div class="form-group col-md-2">
                        <label for="Hips">Biodra</label>
                        <input type="number" min=0 required class="form-control" id="Hips" name="Hips"/>
                </div>
                <div class="form-group col-md-2">
                        <label for="Thigh">Udo</label>
                        <input type="number" min=0 required class="form-control" id="Thigh" name="Thigh"/>
                </div>
                                <div class="form-group col-md-2">
                        <label for="Arm">Ramię</label>
                        <input type="number" min=0 required class="form-control" id="Arm" name="Arm"/>
                </div>
            </div>
            <input type="submit" value="Wyślij" class="btn btn-primary" /> 
        </fieldset>
    </form>
</div>
@endsection