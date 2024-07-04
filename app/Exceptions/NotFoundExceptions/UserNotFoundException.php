<?php

namespace App\Exceptions\NotFoundExceptions;

class UserNotFoundException extends BaseNotFoundException
{
    public function __construct(string $message = "User not found")
    {
        parent::__construct($message);
    }
}
