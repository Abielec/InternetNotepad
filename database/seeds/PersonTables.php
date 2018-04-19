<?php

use Illuminate\Database\Seeder;
use App\Persons;
class PersonTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Person = new Persons();
        $Person->Personid = 1;
        $Person->name = "Adrian";
        $Person->LastName = "Bielec";
        $Person->Height = 180;
        $Person->Weight = 80;
        $Person->Age = "1999.08.02";
        $Person->Gender = "Male";
        $Person->FitWaist = "Yes";
        $Person->Pattern = "Mifflin";
        $Person->ShowBMI = "Yes";
        $Person->save();

        $Person = new Persons();
        $Person->Personid = 2;
        $Person->name = "Dariusz";
        $Person->LastName = "Mylicki";
        $Person->Height = 170;
        $Person->Weight = 94;
        $Person->Age = "1969.03.02";
        $Person->Gender = "Male";
        $Person->FitWaist = "Yes";
        $Person->Pattern = "Mifflin";
        $Person->ShowBMI = "Yes";
        $Person->save();

        $Person = new Persons();
        $Person->Personid = 3;
        $Person->name = "Agata";
        $Person->LastName = "Młynarz";
        $Person->Height = 163;
        $Person->Weight = 64;
        $Person->Age = "2000.01.12";
        $Person->Gender = "Female";
        $Person->FitWaist = "No";
        $Person->Pattern = "Mifflin";
        $Person->ShowBMI = "Yes";
        $Person->save();
    }
}
