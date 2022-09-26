<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function format(){

        return [
            'vehicle#' =>     $this->vehicle_number,
            'engine#' =>      $this->engine_number,
            'registration_date' =>  Carbon::parse($this->registration_date)->diffForHumans(),
        ];

    }

}
