<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'alamat'=>'required',
            'no_hp'=>'required|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=> 'Confilct',
                'erorr'=> $validator->errors()
            ],409);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $auth_token = explode('|', $token)[1];

        return response()->json([
            'message' => 'You have Successfully Registered',
            'data' => $user,
            'access_token' => $auth_token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $auth_token = explode('|', $token)[1];

        return response()->json([
            'message' => 'Login success',
            'access_token' => $auth_token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
            Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }

    public function me()
    {
        
    }
}
