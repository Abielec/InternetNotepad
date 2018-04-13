<?php

use Illuminate\Database\Seeder;
use App\Categories;
class CategoiresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Category = new Categories();
        $Category->categoryname = 'Owoce';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Warzywa';
        $Category->save();
        
        $Category = new Categories();
        $Category->categoryname = 'Nabiał';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Mięso';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Rośliny';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Bezglutenowe';
        $Category->save();
    }
}
