@extends('layouts.PLayout')
@section('content')
@php

// Load data
////////////////////////////////////////////////////////////////////////////
///////////////////////////Get informations about person///////////////////
//////////////////////////////////////////////////////////////////////////

$ID = Auth::user()->id;
$Information = DB::table('persons')
    ->select('persons.Name','LastName','Height','Weight','Age','Gender')
    ->join('users','persons.PersonId','=','users.id')
    ->where('persons.PersonId','=',"$ID")
    ->first();
                $FirstName = $Information->Name;
                $LastName = $Information->LastName;
                $Height = $Information->Height;
                $Weight = $Information->Weight;
                $Age = $Information->Age;
                $Gender = $Information->Gender;
            // Check how old are person
    $Years = Carbon\Carbon::Parse($Age)->year;
    $Months = Carbon\Carbon::Parse($Age)->month;
    $Days = Carbon\Carbon::Parse($Age)->day;
    $Age = Carbon\Carbon::createFromDate($Years,$Months,$Days)->age;

    //////////////////////////////////////////////////////////////////////////
    /////////////////Load information about girts of person//////////////////
    ////////////////////////////////////////////////////////////////////////

    $GirtInformation = DB::table('girts')
        ->select('Calf','Pas','Waist','Chest','Hips','Thigh','Arm')
        ->join('users','users.Id','=','girts.PersonId')
        ->where('users.Id','=',"$ID")
        ->orderBy('girts.created_at','desc')
        ->first();
        $Calf = $GirtInformation->Calf;
        $Pas = $GirtInformation->Pas;
        $Waist = $GirtInformation->Waist;
        $Chest = $GirtInformation->Chest;
        $Hips = $GirtInformation->Hips;
        $Thigh = $GirtInformation->Thigh;
        $Arm = $GirtInformation->Arm;
    ///////////////////////////////////////////////////////////////////
    //////////////////////Get eated products today////////////////////
    /////////////////////////////////////////////////////////////////
    $CurrentTime = date("Y-m-d");
    $EatedProducts = DB::table('eatens')
    ->select('make_products.ProductName','eatens.EatedAbout','Calories','Carbohydrates','Fats','Proteins','Roughages','eatens.EatedWeight')
    ->join('users','eatens.EatedBy','=','users.id')
    ->join('make_products','make_products.id','=','eatens.EatedProduct')
    ->where('EatedDate','=',"$CurrentTime")
    ->get();
@endphp
        <div class="container-fluid">
            <h3 style="text-align:center;">Witaj {{$FirstName}}</h3>
            <div class="row">
                <div class="col">
                    <table id="PersonalInformation" style="float:left;">
                        <tr>
                            <td>BMR</td>
                            <td>
                                @php
                                    if($Gender=='Male')
                                    {
                                        echo (66+(13.7*$Weight) + (5*$Height) - (6.76*$Age));
                                    }
                                    else
                                    {
                                        echo 655+(9.6*$Weight) + (1.8*$Height) - (4.7*$Age);
                                    }
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td>BMI</td>
                            <td>
                                @php    
                                    echo Round($Weight/(($Height/100)*($Height/100)),2);
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Wymiary</td>
                        </tr>
                        <tr>
                            <td>Ramię</td>
                            <td>{{ $Arm }}cm</td>
                        </tr>
                        <tr>
                            <td>Udo</td>
                            <td>{{ $Thigh }}cm</td>
                        </tr>
                        <tr>
                                <td>Biodro</td>
                                <td>{{ $Hips }}cm</td>
                        </tr>
                        <tr>
                                <td>Klatka piersiowa</td>
                                <td>{{ $Chest }}cm</td>
                        </tr> 
                        <tr>
                                <td>Talia</td>
                                <td>{{ $Waist }}cm</td>
                        </tr>
                        <tr>
                            <td>Pas</td>
                            <td>{{ $Pas }}cm</td>
                        </tr>
                        <tr>
                            <td>Łydka</td>
                            <td>{{ $Calf }}cm</td>
                        </tr>
                    </table>
                </div>
                <div class="col">
                    <h3 style="text-align:center;">Zjedzone dzisiaj</h3>
                    <table style="text-align:center;" class="table">
                        <tr>
                            <td style="padding:5px;">Nazwa produktu</td>
                            <td style="padding:5px;">O której godzinie</td>
                            <td style="padding:5px;">Kcal</td>
                            <td style="padding:5px;">Masa</td>
                        </tr>
                        @php
                        $CaloriesToday=0;$Carbohydrates=0;$Fats=0;$Proteins=0;$Roughages=0;
                            foreach($EatedProducts as $EatedProduct)
                            {
                                echo "<tr>";
                                echo "<td>".$EatedProduct->ProductName."</td>";
                                echo "<td>".$EatedProduct->EatedAbout."</td>";
                                echo "<td>".($EatedProduct->EatedWeight/100)*$EatedProduct->Calories."</td>";
                                echo "<td>".$EatedProduct->EatedWeight."<sub>g</sub></td>";
                                echo "</tr>";
                                $CaloriesToday += ($EatedProduct->EatedWeight/100)*$EatedProduct->Calories;
                                $Carbohydrates += ($EatedProduct->EatedWeight/100)*$EatedProduct->Carbohydrates;
                                $Fats += ($EatedProduct->EatedWeight/100)*$EatedProduct->Fats;
                                $Proteins += ($EatedProduct->EatedWeight/100)*$EatedProduct->Proteins;
                                $Roughages += ($EatedProduct->EatedWeight/100)*$EatedProduct->Roughages;
                            }
                        @endphp
                        <tr>
                            <td colspan="3">Zjedzone kalorie dziś</td>
                            <td> {{ $CaloriesToday }}</td>
                    </table>
                    <a href="{{ route('Eated') }}">Zjedz coś</a>
                </div>
                <div class="col">
                    <table id="PersonalInformation" style="float:right;">
                        <tr>
                            <td>Imię</td>
                            <td>{{ $FirstName }}</td>
                        </tr>
                        <tr>
                            <td>Nazwisko</td>
                            <td>{{ $LastName }}</td>
                        </tr>
                        <tr>
                            <td>Wzrost</td>
                            <td>{{ $Height }}cm</td>
                        </tr>
                        <tr>
                            <td>Waga</td>
                            <td>{{ $Weight }}kg</td>
                        </tr>
                        <tr>
                            <td>Wiek</td>
                            <td>{{ $Age }}lat</td>
                        </tr>
                        <tr>
                            <td>Płeć</td>
                            <td>@if($Gender == 'Male')Mężczyzna @else Kobieta @endif</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" style="width:60%;margin-left:20%;margin-top:34px;">
                <table>
                <tr>
                    <td colspan=2>Dzisiaj zjadłeś już :<td>
                </tr>
                <tr>
                    <td>Białko:</td>
                    <td><b>{{ $Proteins }}<sub>g</sub></b></td>
                </tr>
                <tr>
                    <td>Tłuszcze:</td>
                    <td><b>{{ $Fats }}<sub>g</sub></b></td>
                </tr>
                <tr>
                    <td>Węglowodany:</td>
                    <td><b>{{ $Carbohydrates }}<sub>g</sub></b></td>
                </tr>
                <tr>
                    <td>Błonnik:</td>
                    <td><b>{{ $Roughages }}<sub>g</sub></b></td>
                </tr>
                </table>
            </div>
        </div>
@endsection