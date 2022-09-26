<?php
namespace App\Repositories;
use App\Vehicle;
use Carbon\Carbon;

class VehicleRepository{

    public function all(){

        return Vehicle::orderBy('vehicle_number')->get()->map(function($vehicle){
            return $vehicle->format();
        });

        // return Vehicle::orderBy('vehicle_number')->get()->map(function($vehicle){
        //     return [
        //         'vehicle#' =>     $vehicle->vehicle_number,
        //         'engine#' =>      $vehicle->engine_number,
        //         'registration_date' =>  Carbon::parse($vehicle->registration_date)->diffForHumans(),
        //     ];
        // });
        
    }

    public function findById($id){

        $vehicle = Vehicle::whereId($id)->firstOrFail();
        return $vehicle->format();

    }

}