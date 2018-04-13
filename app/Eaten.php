<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eaten extends Model
{
    protected $fillable = [ 
        'EatedBy','EatedProduct','EatedWeight','EatedAbout','EatedDate'
    ];
}
