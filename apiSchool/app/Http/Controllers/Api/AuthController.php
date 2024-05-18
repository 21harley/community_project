<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //validacion de los datos
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
         
        //crear User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();   
     
        // return response()->json(['message' => 'registro exitoso', 'user' => $user], 200);
        return response($user,Response::HTTP_CREATED);
    }
    public function profile(Request $request){
        return response()->json(
            ["message" => "perfil del usuario",
             "user" => Auth::user()
            ],Response::HTTP_OK);
    }
    public function login(Request $request){
        //validacion de los datos
        $credentials=$request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        //verificar si el usuario existe
        // $user = User::where('email', $request->email)->first();
        // if(!$user || !Hash::check($request->password, $user->password)){
        //     return response([
        //         'message' => 'Credenciales incorrectas'
        //     ], Response::HTTP_UNAUTHORIZED);
        // }
        // $token = $user->createToken('myapptoken')->plainTextToken;
        // return response([
        //     'user' => $user,
        //     'token' => $token
        // ], Response::HTTP_CREATED);
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token',$token,60*24);
            return response(["token" => $token],Response::HTTP_OK)->withCookie($cookie);
        }else{
            return response(["message" => "Credenciales incorrectas"],Response::HTTP_UNAUTHORIZED);
        }
    }
    public function logout(){
        $cookie = cookie('cookie_token',null,-1);
        return response(["message" => "logout"],Response::HTTP_OK)->withCookie($cookie);
    }
    public function usersAll(Request $request){
        return response()->json(
            ["message" => "todos los usuarios",
             "users" => User::all()
            ],Response::HTTP_OK);
    }
}
