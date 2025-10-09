<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // User registration
    public function register(Request $request){
        
        $data = $request->validate([
            "name" => 'string|required|max:255',
            "email" => 'email|required|unique:users',
            "password" => 'required|confirmed|min:4',


        ]);

        $user = User::create($data);
        // Create token
        $token = $user->createToken($data['name']);
        return response()->json([
            'status' => 'success',
            'message' => 'User created sucessfully',
            'token'  => $token->plainTextToken
        ]);
    }

    // User login
    public function login(Request $request){
        $data = $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email' , $data['email'])->first();

        if ( !$user || !Hash::check( $data['password'], $user->password)) {
            return response()->json([
              'status' => 'error',
              'message' => 'Credentials do not match any user.'
            ]);
        }

        $token = $user->createToken($user->name );
        return response()->json([
            'status' => 'success',
            'message' => 'User logged sucessfully',
            'token'  => $token->plainTextToken
        ]);


    }

    // User logout
    public function logout(Request $request){
        $request->user()->tokens()->delete();
         return response()->json([
            'status' => 'success',
            'message' => 'User logged out sucessfully'
        ]);
    }
}
