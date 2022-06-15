<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
 
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
            'email'=>'required',
            'password'=>'required|min:3'
        ]);

       $userData = $request->all();
       // hashing the password , its important
       $userData['password'] = Hash::make($request->password);
       $user = User::create($userData);
       return response()->json(['status'=>true, 'msg'=>'User created successfully', 'data'=>$user], 201);   
   }
}