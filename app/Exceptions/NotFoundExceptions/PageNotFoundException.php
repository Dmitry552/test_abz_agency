<?php

namespace App\Exceptions\NotFoundExceptions;

class PageNotFoundException extends BaseNotFoundException
{
    public function __construct(string $message = "Page not found")
    {
        parent::__construct($message);
    }
}
