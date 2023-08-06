<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => "required|string",
            "password" => "required",
        ]);
        if ($validator->fails())
            return response()->json(["validation_errors" => $validator->errors()]);

        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            return response()->json(['login' => false, 'message' => 'Usuário ou senha incorreto.']);

        $user = Auth::user();

        if (!$user->active)
            return response()->json(['login' => false, 'message' => 'Sua conta está desativada. Contate seu coordenador.']);

        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['login' => true, 'token' => $token, 'data' => $user]);
    }

    public function logout()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json(["status" => "success"]);
        } else {
            return response()->json(["status" => "failed", "message" => "Usuário não encontrado"]);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "current" => "required|string|min:6",
            "new" => "required|string|min:6",
            "confirm" => "required|string|min:6",
        ]);

        if ($validator->fails())
            return response()->json(["validation_errors" => $validator->errors()]);

        if ($request->new !== $request->confirm)
            return response()->json(['success' => false, 'message' => 'As senhas não correspondem']);

        $user = Auth::user();

        if (!Hash::check($request->current, $user->password))
            return response()->json(['success' => false, 'message' => 'A senha atual está incorreta']);

        try {
            $user->update(['password' => bcrypt($request->new)]);
            return response()->json(['success' => true, 'message' => 'Senha alterada com sucesso']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Erro ao alterar senha']);
        }
    }
}
