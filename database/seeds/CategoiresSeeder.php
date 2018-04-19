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
        $Category->categoryname = "Brak";
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Owoce';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Warzywa';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Napoje i alkohole';
        $Category->save();
        
        $Category = new Categories();
        $Category->categoryname = 'Fast food';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Nabiał';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Mięso';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Roślinne';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Nabiał i jaja';
        $Category->save();

        $Category = new Categories();
        $Category->categoryname = 'Bezglutenowe';
        $Category->save();
    }
}
