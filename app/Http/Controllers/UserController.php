<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use JWTAuth;

class UserController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $users = User::all();
       return $users;
   }
 
   /**
    * Store a newly created resource in storage.
    *
    */
   public function store(Request $request)
   {
    
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:3'
        ]);

       $userData = $request->all();
       // hashing the password , its important
       $userData['password'] = Hash::make($request->password);
       $user = User::create($userData);
       // Make token from new user
       $token = JWTAuth::fromUser($user);

       return response()->json(['status'=>true, 'msg'=>'User created successfully', 'data'=>$user, 'token'=>$token], 201);   
   }
}