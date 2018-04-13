<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class girt extends Model
{
    protected $fillable = [ 
        'Calf','Pas','Waist','Chest','Hips','Thigh','Arm','PersonId','created_at'
    ];
        protected $hidden = [
            'PersonId'
        ];
}
