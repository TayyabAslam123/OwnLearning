<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function index(){
       
       $arr = [1,2,3,4,5,6,7,8,0,10,11,12,13,14,15]; 
    //    rsort($arr);
    //    dd($arr);
       
       $arr2 = array(1,2,3,4,5);
       
       $arr3 = ["a","1",5];
       
       $arr4['red-balls'] = [11,22,33,44,55];
       
       $arr5 = [];

    //    foreach($arr1 as $key=>$val){
    //        echo $key;
    //    }

       foreach($arr1['red-balls'] as $key=>$val){
           echo $val;
           echo "<br>";
       }

    }
    ####################################################
    public function index2(){
     
        $array = array("name"=>"tayyab", "age"=>24, "gender"=>"male");
        $array2 = ["city"=>"lahore", "town"=>"johar town"];
        $array2['country']= "pakistan";
        $arr3 = array_merge($array,$array2);

        // foreach($arr3 as $key=>$val){
        //     echo $key."__";
        //     echo $val;
        //     echo "<br>";
        // }

        $a=[];
        array_push($a,"blue","yellow");
        array_pop($a);
       
        // $test=[];
        $test['customer']= ["name"=>"tayyab", "age"=>24, "gender"=>"male"];
        $test['seller']= ["name"=>"john doe", "age"=>50, "gender"=>"male"];
        // dd($test);

        $twod= [[1,2,3],[4,5,6],[7,8,9]];
        dd($twod);

    }

    ## NOTES ##
    // define simple array like this
    // $arr = [1,2,3,4,5,6,7,8,9,10];
    // OR
    // $arr = array(1,2,3,4,5);
    // if $arr = [] it means normal array defined
    // and if it is $arr[]=[] it means array in a array
    //$arr['customer']="tayyab" @ add key @




}
