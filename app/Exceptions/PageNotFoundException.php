<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class PageNotFoundException extends Exception
{
    public function __construct(string $message = "Page not fount")
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
