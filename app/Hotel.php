<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    
    public function branches()
    {
        return $this->hasMany('App\Branch');
    }

}
