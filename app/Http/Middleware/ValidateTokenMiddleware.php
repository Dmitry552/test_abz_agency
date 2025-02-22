<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ValidateTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token');

        if (empty($token)) {
            return response()->json([
                "success" => false,
                "message" => "Unauthorized."
            ], 401);
        }

        try {
            JWTAuth::setToken($token)->getPayload();
        } catch (JWTException $e) {
            return response()->json([
                "success" => false,
                "message" => 'The token expired',
            ], 401);
        }

        return $next($request);
    }
}
