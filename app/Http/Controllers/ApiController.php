<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Role;
use Exception;


class ApiController extends Controller
{
    use ApiResponser;

    public function getRoles(){
        try{
            $data = Role::all();
            return $this->successResponse($msg='All roles data fetched succesfully', $data,200);
        }catch(Exception $e){
            return response()->json(['status'=>'false', 'data' => $e->getMessage()], 500);
        }
    } 

    public function delRole($id){
        try{
            $role=Role::findOrFail($id);
            $role->delete();
            return $this->successResponse($msg='Role deleted successfully', $role, 200);
        }catch(Exception $e){
            return response()->json(['status'=>'false', 'data' => $e->getMessage()], 500);
        }
    }


}
