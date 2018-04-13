<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = [ 
    'Name','LastName','Height','Weight','Age','Gender','PersonId'
];
    protected $hidden = [
        'PersonId'
    ];
}
