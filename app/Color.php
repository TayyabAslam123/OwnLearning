<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name'];
    protected $hidden = [
        'pivot'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}
