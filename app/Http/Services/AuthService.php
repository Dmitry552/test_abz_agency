<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class AuthService
{
    /**
     * @return JsonResponse
     */
    public function getToken(): JsonResponse
    {
        $token = JWTAuth::encode(JWTFactory::make())->get();

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
}
