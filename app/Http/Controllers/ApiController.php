<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Role;

class ApiController extends Controller
{
    use ApiResponser;

    public function getRoles(){
    
        $data = Role::all();
        return $this->successResponse($data,200);

    } 


}
