<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
}
