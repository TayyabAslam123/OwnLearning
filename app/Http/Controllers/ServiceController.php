<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\RoleService;

class ServiceController extends Controller
{
    public function getCount(){

        $role = new RoleService();
        $result = $role->updateRole();
        dd($result);
    }

    public function delOdd(){

        $role = new RoleService();
        $result = $role->delRole();
        dd($result);
    }

    
}
