<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeProducts extends Model
{
   protected $fillable = [
    'ProductName', 'Calories','Carbohydrates','Fats','Proteins','Vitamins','Description','Roughages','Category','Barcode'
   ];
}
