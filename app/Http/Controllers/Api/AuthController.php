<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        /* if($request->name = '' || $request->password == '')
            return response()->json(['message' => 'These credentials do not match our records.'], 404); */

        if(!DB::table('users')->where('email', $request->email)->exists()){
            return response()->json(['message' => 'No existe este Correo Electronico'], 404);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        //hash para ver si son iguales
        if($user->tipo == 'paciente'){
            if(Hash::check($request->password, $user->password)){
                return $user;
            }else{
                return response()->json(['message' => 'La contraseña es Incorrecta'], 404);
            }
        }else{
            //
            return response()->json(['message' => 'No es Cliente'], 404);
        }
    }
}
