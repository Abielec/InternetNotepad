@extends('layouts.PLayout')
@section('content')
    <div class="container" style="display:flex;align-items:center;justify-content:center;height:100vh;">
        <form method="POST" action="{{ route('DoFillInformation') }}">
            @csrf
            <fieldset>
                <legend style="text-align:center;">Uzupełnianie informacji o osobie</legend>
                @if($errors->any())
                <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                        @endforeach
                </ul>
        @endif
                <div class="form-row">
                    <input type="hidden" value="{{Auth::user()->id}}" name="PersonId" />
                        <div class="form-group col-md-6">
                          <label for="Name">Imię</label>
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
                          <label for="Age">Data urodzenia</label>
                        <input type="date" class="form-control" name="Age" />
                      </div>
                      <div class="form-group col-md-3">
                          <label for="gender">Płeć</label>
                        <select class="custom-select custom-selet-lg mb-3" name="Gender">
                            <option value="Male" selected>Mężczyzna</option>
                            <option value="Female">Kobieta</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Destination">Cel</label>
                          <select class="custom-select custom-selet-lg mb-3" name="Destination" id="Destination">
                              <option value="LoseWeight" selected>Zrzucić masę</option>
                              <option value="GainWeight">Nabrać masę</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                                <label for="FitWaist">Czy posiadasz opaskę fit?</label>
                              <select class="custom-select custom-selet-lg mb-12" aria-describedby="FitWaistHelp" name="FitWaist" id="FitWaist">
                                  <option value="No" selected>Nie</option>
                                  <option value="Yes">Tak</option>
                              </select>
                              <small id="FitWaistHelp" class="form-text text-muted"><a href="#">Co to jest?<a></small>
                            </div>
                            <div class="form-group col-md-3">
                                    <label for="Pattern">Wybierz wzór</label>
                                  <select class="custom-select custom-selet-lg mb-12" name="Pattern" id="Pattern">
                                      <option value="Mifflin" selected>Mifflin</option>
                                      <option value="Harris">Harris</option>
                                  </select>
                                  <small id="FitWaistHelp" class="form-text text-muted"><a href="#">Co to jest?<a></small>
                                </div> 
                                <div class="form-group col-md-3">
                                        <label for="ShowBMI">Pokaż BMI</label>
                                      <select class="custom-select custom-selet-lg mb-12" name="ShowBMI" id="ShowBMI">
                                          <option value="Yes" selected>Yes</option>
                                          <option value="No">Tak</option>
                                      </select>
                                      <small id="FitWaistHelp" class="form-text text-muted"><a href="#">Co to jest?<a></small>
                                    </div>                                                           
                    </div>
                      <button type="submit" class="btn btn-primary">Wyślij</button>
            </fieldset>
        </form>
    </div>
@endsection