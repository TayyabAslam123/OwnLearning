<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Role;

class RoleService{


    public function updateRole(){

        $result = Role::count();
        return $result;

    }

    public function delRole(){

        $result = Role::where('id', '<', '51' )->delete();
        return $result;

    }



}