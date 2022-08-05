<?php
namespace App\MyCustomLibraries;
use Illuminate\Support\Facades\Facade;

class RoleFacade extends Facade{ 

    protected static function getFacadeAccessor(){

        return new Role(); 

    }

}
?>