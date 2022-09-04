<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['id', 'title' , 'body' , 'url'];
}
