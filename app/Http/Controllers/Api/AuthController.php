<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    //
    public function register(Request $request){
        
        //se valida la información que viene en $request
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:80',
            'password' => 'required|string|min:8'
        ]);
        
        //se crea el usuario en la base de datos
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);
        
        //se crea token de acceso personal para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;
        return $user;
        //se devuelve una respuesta JSON con el token generado y el tipo de token
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'

        ]);
    }
 public function login(Request $request)
    {
       // $validator=Validator::make($request->all(), [
       //     'email' => ['required', 'string', 'email'],
       //     'password' => ['required'],
      //  ]);
      //  if($validator->fails()){
      //      return response()->json(['status_code'=>400,'message'=>'bad request']);
      //  }
//get parametros 
//
        $credentials=request(['email','password']);
        if(!Auth::attempt($credentials)){
            return response()->json(['status_code'=>500,'message'=>'Unauthorized']);
        }
        $user=User::where('email',$request->email)->first();
        $tokenResult=$user->createToken('authToken')->plainTextToken;
        return response()->json(['status_code'=>200,'token'=>$tokenResult]);

    }

   // public function logout(Request $request)
   // {
   //     $request->user()->currentAccessToken()->delete();
   //     return response()->json(['status_code'=>200,'message'=>'token deleted']);

    //}
}
