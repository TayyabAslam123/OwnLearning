<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{


    public function Hotel()
    {
        return $this->belongsTo('App\Hotel');
    }


}
