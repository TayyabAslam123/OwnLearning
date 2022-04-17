<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use Illuminate\Support\Facades\Validator;

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
            'email'=>'required|max:8|integer',
            'password'=>'required|min:3'
         ]);

        ## method 3 
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|max:255',
        //     'password' => 'required',
        // ]);
 
        // dd($validator);
        ## if validation fails redirect to something custom
        // if ($validator->fails()) {
        //     return redirect('show-view-2')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }



         
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



    