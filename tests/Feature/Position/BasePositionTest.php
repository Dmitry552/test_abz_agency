<?php

namespace Tests\Feature\Position;

use Tests\TestCase;

abstract class BasePositionTest extends TestCase
{
    protected const ROUTE_POSITIONS_INDEX = 'api/positions';

    /** Structures */
    protected function getPositionStructure(): array
    {
        return [
            'id',
            'name'
        ];
    }

    protected function getPositionsStructure(): array
    {
        return [
            'success',
            'positions' => [
                '*' =>  $this->getPositionStructure()
            ]
        ];
    }

    /** Fragments */
    protected function getPositionsFragment(): array
    {
        return [
            'success' => true
        ];
    }

    /** Exceptions structures */
    protected function getErrorPositionsNotFoundStructure(): array
    {
        return [
            'success',
            'message'
        ];
    }

    /** Exceptions fragments */
    protected function getErrorPositionsNotFoundFragment(): array
    {
        return [
            'success' => false,
            'message' => 'Positions not found'
        ];
    }
}
