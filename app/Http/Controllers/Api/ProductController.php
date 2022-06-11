<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Auth;
use JWTAuth;

class ProductController extends Controller
{
    
    // but better is to use $user = auth()->user();
    public function  getUserByToken(Request $request){
        $token = $request->header('Authorization'); // get token from header
        $user = JWTAuth::toUser($token); // user having this token
        return response()->json(['user'=>$user]); // return
    }


    public function  getproducts(Request $request){
        $user = auth()->user();
        $user = User::whereId($user->id)->first();
        $products = $user->products;
        return response()->json(['status'=>true,'msg'=>'Products received', 'products'=>$products], 200);
    }


}
