<?php

use Illuminate\Database\Seeder;
use App\Dishes;
class DishesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Dish = new Dishes();
        $Dish->DishName = "Spagethi";
        $Dish->save();

        $Dish = new Dishes();
        $Dish->DishName = "Lazania";
        $Dish->save();

        $Dish = new Dishes();
        $Dish->DishName = "Rosół";
        $Dish->save();
    }
}
