<?php

use Illuminate\Database\Seeder;
use App\MakeProducts;

class ProductsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Product = new MakeProducts();
        $Product->ProductName = "Woda polaris, o smaku truskawkowym";
        $Product->Barcode = "867296";
        $Product->Category = 4;
        $Product->Calories = 11;
        $Product->Carbohydrates = 2.5;
        $Product->Fats = 0;
        $Product->Proteins = 0;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Płatki czekoladowe, chocapic";
        $Product->Barcode = "004710";
        $Product->Category = 11;
        $Product->Calories = 388;
        $Product->Carbohydrates = 76;
        $Product->Fats = 4.5;
        $Product->Proteins = 8.1;
        $Product->Roughages = 6.8;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Pierś z kurczaka,  bez skóry";
        $Product->Barcode = "000000";
        $Product->Category = 7;
        $Product->Calories = 99;
        $Product->Carbohydrates = 0;
        $Product->Fats = 1.3;
        $Product->Proteins = 21.5;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Udko z kurczaka, bez skóry";
        $Product->Barcode = "000001";
        $Product->Category = 7;
        $Product->Calories = 125;
        $Product->Carbohydrates = 0;
        $Product->Fats = 6;
        $Product->Proteins = 17.8;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Kukurydza Dawtona";
        $Product->Barcode = "001795";
        $Product->Category = 8;
        $Product->Calories = 126;
        $Product->Carbohydrates = 24;
        $Product->Fats = 1.2;
        $Product->Proteins = 2.9;
        $Product->Roughages = 3.9;
        $Product->save();
        
        $Product = new MakeProducts();
        $Product->ProductName = "Danone Dan Mleko";
        $Product->Barcode = "016978";
        $Product->Category = 6;
        $Product->Calories = 68;
        $Product->Carbohydrates = 11.5;
        $Product->Fats = 1;
        $Product->Proteins = 3.2;
        $Product->Roughages = 0.15;
        $Product->save();
        
        $Product = new MakeProducts();
        $Product->ProductName = "Ser żółty światowid Gouda";
        $Product->Barcode = "060395";
        $Product->Category = 6;
        $Product->Calories = 335;
        $Product->Carbohydrates = 0.1;
        $Product->Fats = 27;
        $Product->Proteins = 23;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Mleko 2% Mleczna dolina";
        $Product->Barcode = "003957";
        $Product->Category = 6;
        $Product->Calories = 47;
        $Product->Carbohydrates = 4.3;
        $Product->Fats = 2;
        $Product->Proteins = 3;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Jabłko";
        $Product->Barcode = "000003";
        $Product->Category = 2;
        $Product->Calories = 52;
        $Product->Carbohydrates = 14;
        $Product->Fats = 0.2;
        $Product->Proteins = 0.3;
        $Product->Roughages = 2.4;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Gruszka";
        $Product->Barcode = "000004";
        $Product->Category = 2;
        $Product->Calories = 57;
        $Product->Carbohydrates = 15;
        $Product->Fats = 0.1;
        $Product->Proteins = 0.4;
        $Product->Roughages = 3.1;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Guiness Piwo";
        $Product->Barcode = "101872";
        $Product->Category = 4;
        $Product->Calories = 43;
        $Product->Carbohydrates = 4;
        $Product->Fats = 0;
        $Product->Proteins = 0.4;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Bułka Grahamka";
        $Product->Barcode = "000005";
        $Product->Category = 12;
        $Product->Calories = 270;
        $Product->Carbohydrates = 57;
        $Product->Fats = 2;
        $Product->Proteins = 9;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Ryż biały";
        $Product->Barcode = "000006";
        $Product->Category = 8;
        $Product->Calories = 358;
        $Product->Carbohydrates = 79;
        $Product->Fats = 1;
        $Product->Proteins = 7;
        $Product->Roughages = 2.4;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Łaciate lody";
        $Product->Barcode = "020934";
        $Product->Category = 8;
        $Product->Calories = 231;
        $Product->Carbohydrates = 25;
        $Product->Fats = 13;
        $Product->Proteins = 3.4;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Hortex, jabłko brzoskwinia";
        $Product->Barcode = "027826";
        $Product->Category = 4;
        $Product->Calories = 36;
        $Product->Carbohydrates = 9;
        $Product->Fats = 0;
        $Product->Proteins = 0;
        $Product->Roughages = 0;
        $Product->save();

        $Product = new MakeProducts();
        $Product->ProductName = "Sprite, cytrynowy";
        $Product->Barcode = "132505";
        $Product->Category = 4;
        $Product->Calories = 9;
        $Product->Carbohydrates = 2;
        $Product->Fats = 0;
        $Product->Proteins = 0;
        $Product->Roughages = 0;
        $Product->save();
    }
}
