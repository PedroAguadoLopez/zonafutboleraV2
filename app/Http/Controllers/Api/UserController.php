<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private function getUserByToken(Request $request)
    {
        $tokenString = $request->bearerToken() ?? $request->token;
        $token = Token::where('token', $tokenString)->first();
        
        return $token ? $token->user : null;
    }

    public function index()
    {
        return response()->json(User::paginate(10));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $tokenString = Str::random(60);
        
        Token::create([
            'user_id' => $user->id,
            'token' => $tokenString
        ]);

        return response()->json([
            'user' => $user,
            'token' => $tokenString
        ]);
    }

    public function updateUsername(Request $request)
    {
        $user = $this->getUserByToken($request);

        if (!$user) {
            return response()->json(['message' => 'Token inválido o no proporcionado'], 401);
        }

        $request->validate([
            'new_username' => 'required|string|max:255',
        ]);

        $user->update(['name' => $request->new_username]);

        return response()->json($user);
    }

    public function updateEmail(Request $request)
    {
        $user = $this->getUserByToken($request);

        if (!$user) {
            return response()->json(['message' => 'Token inválido o no proporcionado'], 401);
        }

        $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user->update(['email' => $request->new_email]);

        return response()->json($user);
    }

    public function updatePassword(Request $request)
    {
        $user = $this->getUserByToken($request);

        if (!$user) {
            return response()->json(['message' => 'Token inválido o no proporcionado'], 401);
        }

        $request->validate([
            'new_password' => 'required|min:8',
        ]);

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['message' => 'Contraseña actualizada']);
    }

    public function destroy(Request $request)
    {
        $user = $this->getUserByToken($request);

        if (!$user) {
            return response()->json(['message' => 'Token inválido o no proporcionado'], 401);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}