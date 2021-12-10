<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Utils;

class AuthController extends Controller
{
    //

    public function register(Request $request){
        $usuario = User::create([
            'name'=> $request->json('name'),
            'email'=>$request->json('email'),
            'password'=>bcrypt($request->json('password'))
        ]);
        $usuario->assignRole('AccesoUsuario');
        return response()->json($usuario);
    }

    public function login(Request $request){
        $creadencials = request(['email', 'password']);
        if (Auth::attempt($creadencials)){
            $user = $request->user();
            $token = $user->createToken('Personasl Access Token');
            return response()->json([
               "access_token"=>$token->plainTextToken
            ]);
        }else{
            return response()->json([
               "message"=>"Unauthenticated"
            ], 401);
        }
    }
}
