<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'email'=>'required|max:8',
            'password'=>'required'
         ]);



    }
}
