<?php

use Illuminate\Database\Seeder;
use App\girt;
class GirtsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PersonGirt = new girt();
        $PersonGirt->PersonId = 1;
        $PersonGirt->Calf = 20;
        $PersonGirt->Pas = 21;
        $PersonGirt->Waist = 22;
        $PersonGirt->Chest = 23;
        $PersonGirt->Hips = 24;
        $PersonGirt->Thigh = 25;
        $PersonGirt->Arm = 26;
        $PersonGirt->save();

        $PersonGirt = new girt();
        $PersonGirt->PersonId = 2;
        $PersonGirt->Calf = 20;
        $PersonGirt->Pas = 21;
        $PersonGirt->Waist = 22;
        $PersonGirt->Chest = 23;
        $PersonGirt->Hips = 24;
        $PersonGirt->Thigh = 25;
        $PersonGirt->Arm = 26;
        $PersonGirt->save();

        $PersonGirt = new girt();
        $PersonGirt->PersonId = 3;
        $PersonGirt->Calf = 20;
        $PersonGirt->Pas = 21;
        $PersonGirt->Waist = 22;
        $PersonGirt->Chest = 23;
        $PersonGirt->Hips = 24;
        $PersonGirt->Thigh = 25;
        $PersonGirt->Arm = 26;
        $PersonGirt->save();
    }
}
