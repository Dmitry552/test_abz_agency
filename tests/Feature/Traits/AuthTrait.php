<?php

namespace Tests\Feature\Traits;

trait AuthTrait
{
    protected function getToken(): string
    {
        $response = $this->get(self::ROUTE_GET_TOKEN)->decodeResponseJson();

        return $response['token'];
    }
}
