<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $field = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!auth()->attempt($field)) {
            return response()->json(['data' => ['message' => 'Invalid data']], 422);
        }

        $token = auth()->user()?->createToken($request->device_name ?? 'api')->plainTextToken;

        return response()->json(['data' => ['token' => $token]]);
    }
}
