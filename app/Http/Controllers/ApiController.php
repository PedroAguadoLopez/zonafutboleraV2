<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class ApiController extends Controller
{
    private function jsonResponse(bool $success, string $message, $data = null, int $status = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data
        ], $status);
    }

    public function getTopUsers()
    {
        try {
            $users = User::take(10)->get();
            return $this->jsonResponse(true, 'Usuarios obtenidos', $users);
        } catch (Exception $e) {
            return $this->jsonResponse(false, 'Error interno', $e->getMessage(), 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
            ]);
            return $this->jsonResponse(true, 'Usuario creado', $user, 201);
        } catch (Exception $e) {
            return $this->jsonResponse(false, 'Error al crear', $e->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->jsonResponse(false, 'Credenciales incorrectas', null, 401);
            }

            $token = Token::create([
                'user_id' => $user->id,
                'token'   => Str::random(60),
            ]);

            return $this->jsonResponse(true, 'Login exitoso', ['token' => $token->token]);
        } catch (Exception $e) {
            return $this->jsonResponse(false, 'Error en login', $e->getMessage(), 500);
        }
    }

    public function updateName(Request $request)
    {
        try {
            $tokenString = $request->bearerToken() ?? $request->token;
            
            $token = Token::where('token', $tokenString)->first();

            if (!$token) {
                return $this->jsonResponse(false, 'Token inválido', null, 401);
            }

            $user = $token->user;
            $user->update([
                'name' => $request->name
            ]);

            return $this->jsonResponse(true, 'Nombre actualizado', $user);
        } catch (Exception $e) {
            return $this->jsonResponse(false, 'Error al actualizar', $e->getMessage(), 500);
        }
    }
}