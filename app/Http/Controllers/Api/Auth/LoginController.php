<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request){
        
        $cred = $request->only(['email', 'password']);
        ## if email / password is wrong
        if(! $token = auth()->attempt($cred)){
            return response()->json(['status'=>true, 'msg'=>'Incorrect email or password'], 401);    
        }

        return $this->respondWithToken($token);
        // return response()->json(['status'=>true,'msg'=>'token received', 'token'=>$token], 201);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
