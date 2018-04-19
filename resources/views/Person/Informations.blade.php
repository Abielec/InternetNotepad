@extends('layouts.PLayout')
@section('content')
@php

// Load data
////////////////////////////////////////////////////////////////////////////
///////////////////////////Get informations about person///////////////////
//////////////////////////////////////////////////////////////////////////

$ID = Auth::user()->id;
$Information = DB::table('persons')
    ->select('persons.Name','LastName','Height','Weight','Age','Gender','ShowBMI','Pattern')
    ->join('users','persons.PersonId','=','users.id')
    ->where('persons.PersonId','=',"$ID")
    ->first();
                $FirstName = $Information->Name;
                $LastName = $Information->LastName;
                $Height = $Information->Height;
                $Weight = $Information->Weight;
                $Age = $Information->Age;
                $Gender = $Information->Gender;
                $ShowBMI = $Information->ShowBMI;
                $Pattern = $Information->Pattern;
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
    ->where('EatedBy','=',"$ID")
    ->get();
@endphp
        <div class="container-fluid">
            <h3 style="text-align:center;">Witaj {{$FirstName}}</h3>
            <div class="row">
                <div class="col">
                    <table id="PersonalInformation" style="float:left;">
                        <tr>
                            <td>CPM</td>
                            <td>
                                @php
                                    if($Gender=='Male')
                                    {
                                            $BMR = $Weight*24*1.15;
                                            echo $BMR;
                                    }
                                    else
                                    {
                                       $BMR = $Weight*24*0.9*1.15;
                                       echo $BMR;
                                    }
                                @endphp
                            </td>
                        </tr>
                       @if($ShowBMI == 'Yes') <tr>
                            <td>BMI</td>
                            <td>
                                @php    
                                    $BMI = Round($Weight/(($Height/100)*($Height/100)),2);
                                    echo $BMI;
                                @endphp
                            </td>
                        </tr>
                        @endif
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
                    <a href="{{ route('EatedList') }}">Wszystkie zjedzone produkty</a>
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
                <div style="margin-left:40px;">Możesz zjeść jeszcze: {{ $BMR-$CaloriesToday }}<sub>kcal</sub><br />
                    Twój organizm potrzebuje {{ Round($Weight/30,2) }}L wody dziennie<br />
                    Organizm średnio potrzebuje 50% węglowodanów względem diety, więc możesz jeszcze zjeść {{($BMR/2) - $Carbohydrates }}<sub>g</sub><br />
                    @php
                        if($BMI<18.5){
                                echo "Masz niedowagę, ";
                                if($Gender == 'Male') 
                                    echo "powinieneś";
                                else {
                                    echo "powinnaś";
                                } 
                                echo " jeść więcej";
                            }
                        else if($BMI>18.5 && $BMI <= 24.99){
                                echo "Posiadasz wagę prawidłową. ";
                            }
                        else if($BMI>24.99)
                        {
                            echo "Masz nadwagę ";
                            if($Gender == 'Male') 
                                    echo "powinieneś";
                                else {
                                    echo "powinnaś";
                                } 
                                echo " jeść mniej";
                            }
                        
                    @endphp
                </div>
            </div>
        </div>
@endsection