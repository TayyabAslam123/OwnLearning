<?php

namespace app\Traits;

trait ApiResponser{

    public function successResponse($msg, $data, $code){
        
        ## Simple
        // return response()->json(['status'=>'success', 'data' => $data], $code);

        ## Call public function with in triat
        $result = $this->prepareData($msg, $data);
        return response()->json($result, $code);


    }

    // public function
    public function prepareData($msg, $data){
        $x = ['status'=>'true','message'=>$msg, 'data' => $data];
        return $x;
    }



}