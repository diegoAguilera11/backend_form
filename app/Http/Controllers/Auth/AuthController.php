<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
            'enterprise_id' => 1
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'message' => 'las credenciales ingresadas son incorrectas'
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'not create token'
            ], 500);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function verifyToken()
    {
        try {
            $token = JWTAuth::getToken();

            // Si no se encuentra el token, devolvemos una respuesta de error
            if (!$token) {
                return response()->json([
                    'error' => 'Token no proporcionado'
                ], 401);
            }

            // verificamos si el token es válido
            $user = JWTAuth::parseToken()->authenticate();

            // si el token es válido retornamos una respuesta exitosa
            return response()->json([
                'message' => 'Token válido',
                'user' => $user
            ]);
        } catch (JWTException $e) {
            // Manejo de excepciones
            return response()->json(['error' => 'Token inválido'], 401);
        }
    }

    public function refreshToken()
    {
        try {
            // Obtiene el token actual del usuario autenticado
            $token = JWTAuth::getToken();

            // Si no se encuentra el token, devuelve una respuesta de error
            if (!$token) {
                return response()->json(['error' => 'Token no proporcionado'], 401);
            }

            // Intenta renovar el token
            $newToken = JWTAuth::refresh($token);

            // Devuelve una respuesta con el nuevo token
            return response()->json(['token' => $newToken]);
        } catch (JWTException $e) {
            // Manejo de excepciones JWT
            return response()->json(['error' => 'No se pudo renovar el token'], 500);
        }
    }
}
