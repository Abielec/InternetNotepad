<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    protected $fillable = [ 
        'Title','content','Image','WritedBy'
    ];
}
