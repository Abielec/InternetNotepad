<?php

use Illuminate\Database\Seeder;
use App\LastGirts;
class LastGirtsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $LastGirt = new LastGirts();
    $LastGirt->user = 1;
    $LastGirt->Calf = 36;
    $LastGirt->Arm = 46;
    $LastGirt->Thigh = 58;
    $LastGirt->Hips = 95;
    $LastGirt->Pas = 92;
    $LastGirt->Waist = 93;
    $LastGirt->Chest = 99;
    $LastGirt->Month = "Maj";
    $LastGirt->save();

    $LastGirt = new LastGirts();
    $LastGirt->user = 1;
    $LastGirt->Calf = 40;
    $LastGirt->Arm = 46;
    $LastGirt->Thigh = 58;
    $LastGirt->Hips = 95;
    $LastGirt->Pas = 92;
    $LastGirt->Waist = 93;
    $LastGirt->Chest = 99;
    $LastGirt->Month = "Maj";
    $LastGirt->save();

    $LastGirt = new LastGirts();
    $LastGirt->user = 1;
    $LastGirt->Calf = 36;
    $LastGirt->Arm = 46;
    $LastGirt->Thigh = 55;
    $LastGirt->Hips = 95;
    $LastGirt->Pas = 92;
    $LastGirt->Waist = 44;
    $LastGirt->Chest = 99;
    $LastGirt->Month = "Kwiecień";
    $LastGirt->save();
    }
}
