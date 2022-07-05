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
            return response()->json(['message' => 'Correo Electronico Inexistente'], 404);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        //hash para ver si son iguales
        if($user->tipo == 'Cliente'){
            if(Hash::check($request->password, $user->password)){
                return $user;
            }else{
                return response()->json(['message' => 'Contraseña Incorrecta'], 404);
            }
        }else{
            //
            return response()->json(['message' => 'Rol Desconocido'], 404);
        }
    }

    public function configuration(){
        $datos = DB::table('configurations')->where('id',1)->first();
        return $datos;
    }

    public function Productos(){
        $datos = DB::table('productos')->get();
        return $datos;
    }

    public function UpdatePerfil(Request $request, $id){

        $cliente = User::find($id);

        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->ci = $request->ci;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return $cliente;
    }


}
