<?php

namespace Tests\Feature\Position;

class PositionTest extends BasePositionTest
{
    public function test_get_users_positions(): void
    {
        $response = $this->get(self::ROUTE_POSITIONS_INDEX);

        $response->assertOk()
            ->assertJsonStructure(parent::getPositionsStructure())
            ->assertJsonFragment(parent::getPositionsFragment());
    }
}
