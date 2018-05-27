<?php

use Illuminate\Database\Seeder;
use App\Eaten;

class EatedTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CurrentTime = date("Y-m-d");

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 2;
        $Meal->EatedWeight = 60;
        $Meal->EatedAbout = "8:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 8;
        $Meal->EatedWeight = 70;
        $Meal->EatedAbout = "8:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 3;
        $Meal->EatedWeight = 110;
        $Meal->EatedAbout = "12:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 13;
        $Meal->EatedWeight = 100;
        $Meal->EatedAbout = "12:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 5;
        $Meal->EatedWeight = 20;
        $Meal->EatedAbout = "12:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 9;
        $Meal->EatedWeight = 120;
        $Meal->EatedAbout = "12:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 12;
        $Meal->EatedWeight = 90;
        $Meal->EatedAbout = "16:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 7;
        $Meal->EatedWeight = 220;
        $Meal->EatedAbout = "16:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();

        $Meal = new Eaten();
        $Meal->EatedBy = 1;
        $Meal->EatedProduct = 1;
        $Meal->EatedWeight = 150;
        $Meal->EatedAbout = "16:00";
        $Meal->EatedDate = $CurrentTime;
        $Meal->save();
    }
}
