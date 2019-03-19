<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
    	'id',
        'title',
        'description',
        'content',
        'images',
        'date',
        'status',
        'idcategory',
    ];

}
