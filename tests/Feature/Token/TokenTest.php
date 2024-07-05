<?php

namespace Tests\Feature\Token;

use Tests\TestCase;

class TokenTest extends TestCase
{
    protected const ROUTE_GET_TOKEN = '/api/token';

    public function test_get_token()
    {
        $response = $this->get(self::ROUTE_GET_TOKEN);

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'token'
            ])
            ->assertJsonFragment(['success' => true]);
    }
}
