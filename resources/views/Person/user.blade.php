@extends('layouts.PLayout')
@push('styles')
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
@endpush
@section('content')
@php
// Load data
////////////////////////////////////////////////////////////////////////////
///////////////////////////Get informations about person///////////////////
//////////////////////////////////////////////////////////////////////////

$ID = Auth::user()->id;
$Information = DB::table('persons')
    ->select('persons.Name','LastName','Height','Weight','Age','Gender','ShowBMI','Pattern','Activity','Destination')
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
                $Activity = $Information->Activity;
                $Destination = $Information->Destination;
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
    ->orderBy('EatedAbout','ASC')
    ->get();
////////////////////////////////////////////////////////////////////////
//////////////////////////Get last 10 weights//////////////////////////
//////////////////////////////////////////////////////////////////////
$LastWeights = DB::table('updated_weights')
        ->select('Weight','Data')
        ->where('PersonId','=',"$ID")
        ->orderBy('Data','ASC')
        ->limit(7)
        ->get();
/////////////////////////////////////////////////////////////////////
///////////////////Take girts for all months////////////////////////
///////////////////////////////////////////////////////////////////

foreach($LastWeights as $LastWeight)
{
   $Data[] = $LastWeight->Data;
   $WeightData[] = $LastWeight->Weight;
}
    $BMI = Round($Weight/(($Height/100)*($Height/100)),2);

    if($Pattern =="Mifflin")
    {
        if($Gender =="Male")
        {
            $PPM = (10*$Weight)+(6*$Height)-(5*$Age)+5;
        }
        else if($Gender =="Female")
        {
            $PPM = (10*$Weight)+(6*$Height)-(5*$Age)-161;
        }
    }
    else if($Pattern =="Harris")
    {
        if($Gender =="Male")
        {
            $PPM = 66.5 + (13.75*$Weight)+(5.003*$Height)-(6.775*$Age); 
        }
        else if($Gender =="Female")
        {
            $PPM = 655.1 + (9.563 * $Weight) + (1.85 * $Height) - (4.676*$Age);
        }
    }
switch($Activity)
{
    case "Ill": $CPM = $PPM * 1.25;break;
    case "Low": $CPM = $PPM * 1.4;break;
    case "Medium": $CPM = $PPM * 1.6;break;
    case "Activ": $CPM = $PPM * 1.75;break;
    case "Very Active": $CPM = $PPM * 2;break;
    case "Proffesional": $CPM = $PPM * 2.3;break;
    default: $CPM = 0;break;
}
$CPM = Round($CPM,2);
@endphp
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-item-image" style="background: url('img/baner6.jpg');"></div>
            <div class="Motivation Motivation-first">
                <h1>Profil użytkownika</h1>
                <h2>Walcz o swoje zdrowie!</h2>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-item-image" style="background: url('img/baner4.jpg');"></div>
            <div class="Motivation Motivation-first">
                <h1>Życie to nieustająca walka.</h1>
                <h2>Walka to niekończące się porażki.</h2>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-item-image" style="background: url('img/baner3.jpg');"></div>
            <div class="Motivation Motivation-first">
                <h1>Wygrasz jeśli przegrasz.</h1>
                <h2>Jeśli przegrałeś, i podniosłeś się... To wcale nie przegrałeś</h2>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="jumbotron mb-0">
    <div class="row">@if($ShowBMI == "Yes")
        <div class="col">
            <h3 class="display-3 text-center h-25 d-flex align-items-center justify-content-center">Twoje BMI</h3>
            <p class="lead p-5">
                Twoje BMI wynosi <b>{{$BMI}}</b>, wskazuje to na to że @php
                    if($BMI<16)
                    {
                        echo "jesteś wygłodzon";
                        if($Gender == "Female")
                        echo "a.";
                        else 
                        echo "y.";   
                    }
                    else if($BMI>=16 && $BMI<17)
                    {
                        echo "jesteś wychudzon";
                        if($Gender == "Female")
                        echo "a.";
                        else 
                        echo "y.";   
                    }
                    else if($BMI>=17 && $BMI< 18.5 )
                    {
                        echo "posiadasz niedowagę.";  
                    }
                   else if($BMI>=18.5 && $BMI < 25 )
                    {
                        echo "masz wagę prawidłową ! Gratulację.";  
                    }
                    else if($BMI>=25 && $BMI <30)
                    {
                        echo "masz nadwagę"; 
                    }
                    else if($BMI>=30 && $BMI <35)
                    {
                        echo "masz pierwszy stopień otyłości."; 
                    }
                    else if($BMI>=35 && $BMI <40)
                    {
                        echo "masz drugi stopień otyłości"; 
                    }
                    else if($BMI>=40)
                    {
                        echo "masz trzeci stopień otyłości"; 
                    }
                @endphp
            </p>
           
        </div> @endif
        <div class="col">
            <h3 class="display-2 h-25 text-center d-flex align-items-center justify-content-center">Twoje CPM</h3>
            <p class="lead p-5">
                Twoje CPM wynosi <b>{{$CPM}}</b>, jako że Twoim celem jest to by @if($Destination == "LoseWeight") schudnąć, odejmujemy od Twojej całkowitej przemiany materii <b>200<sub>kcal</sub></b>. Teraz Twoje CPM wynosi <b>{{$CPM -200 }}<sub>kcal</sub></b>, jest to przybliżona maksymalna wartość kalorii które @if($Gender=="Male")powinieneś@else powinnaś @endif jeść w ciągu dnia. @elseif($Destination=="GainWeight") zyskać na wadzę to dodajemy <b>200<sub>kcal</sub></b>, więc ilość kalorii jaką powinieneś zjeść w ciągu dnia wynosi: <b>{{$CPM+200}}<sub>kcal</sub></b> @endif
            </p>
        </div>
        <div class="col">
            <h3 class="display-3 text-center h-25 d-flex align-items-center justify-content-center">Więcej...</h3>
            <p class="lead p-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum nulla eget dui pharetra auctor. Nunc
                semper mi erat, non auctor neque rhoncus eget. Donec pharetra varius elit ac vehicula.</p>
        </div>
    </div>
</div>
<div class="container-fluid bg-light p-5 Analize text-white">
    <h3 class=" text-center p-3 Analize__div--h4 Analize--h3">Posiłki<br /><small>{{$CurrentTime}}</small></h3>
    <div class="row mt-5">
        <div class="col">
            <div class="table-responsive">
            <table class="table Analize__table ">
                <tr>
                    <td>Nazwa produktu</td>
                    <td>O której godzinie</td>
                    <td>Kcal</td>
                    <td>Węgle</td>
                    <td>Białko</td>
                    <td>Masa</td>
                </tr>
                @php
                $CaloriesToday=0;$Carbohydrates=0;$Fats=0;$Proteins=0;$Roughages=0;$WholeWeight=0;
                    foreach($EatedProducts as $EatedProduct)
                    {
                        echo "<tr>";
                        echo "<td>".$EatedProduct->ProductName."</td>";
                        echo "<td>".$EatedProduct->EatedAbout."</td>";
                        echo "<td>".($EatedProduct->EatedWeight/100)*$EatedProduct->Calories."</td>";
                        echo "<td>".($EatedProduct->EatedWeight/100)*$EatedProduct->Carbohydrates."<sub>g</sub></td>";
                        echo "<td>".($EatedProduct->EatedWeight/100)*$EatedProduct->Proteins."<sub>g</sub></td>";
                        echo "<td>".$EatedProduct->EatedWeight."<sub>g</sub></td>";
                        echo "</tr>";
                        $CaloriesToday += ($EatedProduct->EatedWeight/100)*$EatedProduct->Calories;
                        $Carbohydrates += ($EatedProduct->EatedWeight/100)*$EatedProduct->Carbohydrates;
                        $Fats += ($EatedProduct->EatedWeight/100)*$EatedProduct->Fats;
                        $Proteins += ($EatedProduct->EatedWeight/100)*$EatedProduct->Proteins;
                        $Roughages += ($EatedProduct->EatedWeight/100)*$EatedProduct->Roughages;
                        $WholeWeight += $EatedProduct->EatedWeight;
                    }
                @endphp
                <tr class="Text-NoShadow">
                    <td colspan="2" class="text-right border-right" >Suma:</td>
                    <td> {{ $CaloriesToday }}<sub>kcal</sub></td>
                    <td>{{ $Carbohydrates }}<sub>g</sub></td>
                    <td>{{ $Proteins }}<sub>g</sub></td>
                    <td>{{ $WholeWeight}}<sub>g</sub></td>
            </table>
        </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col text-center ">
            <a class="btn btn-primary p-4 w-50 btn-lg btn-block ml-auto mr-auto" href="{{route('Eated')}}" style=" border-style:outset;box-shadow:0 0 1px black;">Dodaj posiłek</a>
        </div>
    </div>
</div>
<div class="container-fluid Charts">
    <h3 class="text-center p-5 Charts--h3">Analiza Wymiarów:</h3>
    <div class="container">
        <div class="row">
            <div class="col" style="height:40vh;">
                <canvas id="Girts"></canvas>
            </div>
            <div class="col">
                <canvas id="Weight"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="node_modules\chart.js\dist\Chart.js"></script>
    <script>
     /*    Chart.defaults.global.defaultFontColor = '#FFF';*/
         
    let GirtsChart = document.getElementById("Girts").getContext("2d");
    let myGirtsChart = new Chart(GirtsChart, {
        borderColor : "#fffff",
        type: 'line',
        data: {
            labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
            title: {
                display: true,
                text: 'Wymiary ciała',
            },
            datasets: [{
                label: 'Ramię',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    46,
                    50
                ],
                lineTension: 0,
                borderColor: '#DF902A',
                backgroundColor: '#DF902A',
                fill: false
            },
            {
                label: 'Łydka',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    36,
                    40
                ],
                fill: false,
                lineTension: 0,
                borderColor: 'rgba(255,0,0,1)',
                backgroundColor: 'rgba(255,0,0,1)',
            },
            {
                label: 'Biodro',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    95,
                    90
                ],
                fill: false,
                lineTension: 0,
                borderColor: '#2ABADF',
                backgroundColor: '#2ABADF',
            },
            {
                label: 'Udo',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    58,
                    62
                ],
                fill: false,
                lineTension: 0,
                borderColor: '#813FBF',
                backgroundColor: '#813FBF',
            },
            {
                label: 'Klatka piersiowa',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    99,
                    102
                ],
                fill: false,
                lineTension: 0,
                borderColor: '#2ADF4E',
                backgroundColor: '#2ADF4E',
            },
            {
                label: 'Talia',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    93,
                    94
                ],
                fill: false,
                lineTension: 0,
                borderColor: '#99DF2A',
                backgroundColor: '#99DF2A',
            },
            {
                label: 'Pas',
                data: [
                    NaN,
                    NaN,
                    NaN,
                    92,
                    92
                ],
                fill: false,
                lineTension: 0,
                borderColor: '#DFD32A',
                backgroundColor: '#DFD32A'
            }]
        },
        options: {
            responsive: true,
            scales:
                {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Miesiąc'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Wielkość(cm)'
                        }
                    }]
                }
        }

    });
    ////////////
    let WeightChart = document.getElementById("Weight").getContext("2d");;
    let MyWeightChart = new Chart(WeightChart, {
        type: 'line',
        data: {
            labels:<?=json_encode(array_values($Data));?>,
            datasets: [{
                label: 'Waga',
                data: <?=json_encode(array_values($WeightData));?>,
                lineTension: 0,
                borderColor: 'dodgerblue',
                backgroundColor: 'dodgerblue',
                fill: false
            },
            ]
        },
        options: {
            responsive: true,
            scales:
                {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Data'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            max: 100,
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Waga(kg)'
                        }
                    }]
                }
        }

    });
</script>
@endpush