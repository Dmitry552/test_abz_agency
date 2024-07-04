<?php

namespace App\Exceptions\NotFoundExceptions;

class PositionsNotFoundException extends BaseNotFoundException
{
    public function __construct(string $message = "Positions not found")
    {
        parent::__construct($message);
    }
}
