<?php

namespace app\Traits;

trait ApiResponser{

    public function successResponse($data, $code){
        return response()->json(['status'=>'success', 'data' => $data], $code);
    }

}