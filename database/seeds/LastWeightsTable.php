<?php

use Illuminate\Database\Seeder;
use App\UpdatedWeights;

class LastWeightsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<15;$i++)
        {
        $LastWeight = new UpdatedWeights();
        $LastWeight->Weight = (80-$i);
        $LastWeight->Data = "2018.03.0$i";
        $LastWeight->PersonId = 1;
        $LastWeight->save();
        }

        for($i=1;$i<10;$i+=2)
        {
        $LastWeight = new UpdatedWeights();
        $LastWeight->Weight = (80-$i);
        $LastWeight->Data = "2018.03.0$i";
        $LastWeight->PersonId = 2;
        $LastWeight->save();
        }
    }
}
