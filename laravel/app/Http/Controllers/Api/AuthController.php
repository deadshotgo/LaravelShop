<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Http\Requests\Auth\TokenAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken($input['name'], [$input['role']])->plainTextToken;
        return response()->json(['token' => $token, 'role' => $input['role']], 200);
    }

    public function login(LoginAuthRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user['password'])) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        $user->tokens()->delete();
        $token = $user->createToken($user['name'],[$user['role']])->plainTextToken;
        return response()->json(['token' => $token, 'role' => $user['role']]);
    }

    public function token(TokenAuthRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user['password'])) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }
        return response()->json(['token' => $user->createToken($user['name'])->plainTextToken]);
    }
}
