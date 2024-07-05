<?php

namespace Tests\Feature\User;

use Tests\Feature\Traits\AuthTrait;
use Tests\TestCase;

abstract class BaseUserTest extends TestCase
{
    use AuthTrait;

    protected const ROUTE_GET_TOKEN = 'api/token';

    protected const ROUTE_USER_INDEX = 'api/users';
    protected const ROUTE_USER_STORE = 'api/users';
    protected const ROUTE_USER_SHOW = 'api/users/';

    /** Structures */
    protected function getRegisterUserStructure(): array
    {
        return [
            'success',
            'user_id',
            'message'
        ];
    }

    protected function getUserStructure(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'position',
            'position_id',
            'registration_timestamp',
            'photo'
        ];
    }

    protected function getUsersStructure(): array
    {
        return [
            'success',
            'page',
            'total_pages',
            'total_users',
            'count',
            'links' => [
                'next_url',
                'prev_url'
            ],
            'users' =>[
                '*' => $this->getUserStructure()
            ]
        ];
    }

    protected function getUserShowStructure(): array
    {
        return [
            'success',
            'users' => $this->getUserStructure()
        ];
    }

    /** Exceptions structures */
    protected function getErrorNotFoundStructure(): array
    {
        return [
            'success',
            'message'
        ];
    }

    protected function getErrorValidationFailedStructure(): array
    {
        return array_merge($this->getErrorNotFoundStructure(), ['fails']);
    }

    /** Exceptions Fragment */
    protected function getErrorPageNotFoundFragment(): array
    {
        return [
            'success' => false,
            'message' => 'Page not found'
        ];
    }
}
