@extends('layouts.PLayout')
@section('content')
    <div class="container" style="display:flex;align-items:center;justify-content:center;height:100vh;">
        @if($errors->any())
        <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                @endforeach
        </ul>
@endif
        <form method="POST" action="{{ route('DoFillInformation') }}">
            @csrf
            <fieldset>
                <legend style="text-align:center;">Uzupełnianie informacji o osobie</legend>
                <div class="form-row">
                    <input type="hidden" value="{{Auth::user()->id}}" name="PersonId" />
                        <div class="form-group col-md-6">
                          <label for="name">Imię</label>
                          <input type="text" class="form-control" id="Name" name="Name" placeholder="Jan" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="LastName">Nazwisko</label>
                          <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Kowalski" required>
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="Height">Wzrost<sub>(cm)</sub></label>
                        <input type="number" step="0.1" class="form-control" id="Height" name="Height" placeholder="180" size="3" min=0 required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="Weight">Waga<sub>(kg)</sub></label>
                        <input type="number" step="0.1" class="form-control" id="Weight" name="Weight" placeholder="80" min=0 required>
                      </div>
                      <div class="form-group col-md-3">
                          <label>Data urodzenia</label>
       
                        <input type="date" class="form-control" name="Age" />
                      </div>
                      <div class="form-group col-md-3">
                          <label>Płeć</label>
                        <select class="custom-select custom-selet-lg mb-3" name="Gender">
                            <option value="Male" selected>Mężczyzna</option>
                            <option value="Female">Kobieta</option>
                        </select>
                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary">Sign in</button>
            </fieldset>
        </form>
    </div>
@endsection