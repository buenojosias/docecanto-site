<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            "username" =>  "required|string",
            "password" =>  "required",
        ]);
        if($validator->fails())
            return response()->json(["validation_errors" => $validator->errors()]);

        if(! Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            return response()->json(['login' => false, 'message' => 'Usuário ou senha incorreto.']);

        $user = Auth::user();

        if(! $user->active)
            return response()->json(['login' => false, 'message' => 'Sua conta está desativada. Contate seu coordenador.']);

        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['login' => true, 'token' => $token, 'data' => $user]);
    }

    public function logout() {
        $user = Auth::user();
        if(! is_null($user)) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json(["status" => "success"]);
        } else {
            return response()->json(["status" => "failed", "message" => "Usuário não encontrado"]);
        }
    }
}
