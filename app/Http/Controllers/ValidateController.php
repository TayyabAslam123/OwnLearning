<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class ValidateController extends Controller
{

    public function showView(){

        return view('simple-form');
    }
    public function saveData(Request $request){
        ## method 1
        // $rules = [
        //     'email'=>'required|max:8',
        //     'password'=>'required'
        // ];

        // $this->validate($request,$rules);

        ## method 2
        $this->validate($request,[
            'email'=>'bail|required|max:8',
            'password'=>'bail|required|min:3'
         ]);
         
    }
    ## Request ##  
    ##################################################################

    public function showViewTwo(){
        return view('simple-form-2');
    }

    public function saveDataTwo(TestRequest $request){

        dd($request->all());
    }

                 
    }

