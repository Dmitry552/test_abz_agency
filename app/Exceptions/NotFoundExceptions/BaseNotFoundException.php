<?php

namespace App\Exceptions\NotFoundExceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class BaseNotFoundException extends Exception
{
    protected $message;
    protected $code;

    public function __construct(string $message = "Not found", int $code = 404)
    {
        $this->message = $message;
        $this->code = $code;

        parent::__construct($this->message);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->message
        ], $this->code);
    }
}
