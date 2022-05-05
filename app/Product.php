<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price'];
    protected $hidden = [
        'pivot'
    ];

    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }
}
