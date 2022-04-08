<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


class ObjController extends Controller
{
    public function jsonFun(){
        $arr['student'] = ['name'=>'tayyab','age'=>25, 'gender'=>'male'];
        // return json_encode($arr);
        return response()->json(['status' => 'success','data' => $arr]);
    }
    
    public function jsonFun2(){

        ## data in json
        $data = '{"status":"success","data":{"student":{"name":"tayyab","age":25,"gender":"male"}}}';

        ## json decode to assoc array
        // $output = json_decode($data, true);
        // return $output['data']['student'];
        
        ## normal json decode
        // $output2 = json_decode($data);
        //return $output2->status;
        // return $output2->data->student->name;
        
        ## ilterate through json data
        // $data = json_decode($data, true);
        // print('<pre>'.print_r($data,true).'</pre>');
       
    }

    public function ex(){
        try {
            $x= $this->hello(); 
        }catch(Exception $e) {
            ## Mostly used is get message 
            echo $e->getMessage();
            echo "<br>";
            echo $e->getFile();
            echo "<br>";
            echo $e->getLine();
            echo "<br>";
            echo $e->getCode();
        }
    
    }
    


}
