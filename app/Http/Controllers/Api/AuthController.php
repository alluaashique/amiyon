<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
   
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function me(Request $request)
    {
        $user = JWTAuth::user();
        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
    }

    public function refresh()
    {
        try {
            $token = JWTAuth::getToken(); 
            $newToken = JWTAuth::refresh($token); 
            return response()->json([
                'success' => true,
                'token' => $newToken,
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to refresh token',
            ], 500);
        }
    }
}
