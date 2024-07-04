<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class PositionsNotFoundException extends Exception
{
    public function __construct(string $message = "Positions not found")
    {
        parent::__construct($message);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->message
        ], 404);
    }
}
