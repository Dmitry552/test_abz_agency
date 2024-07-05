<?php

namespace Tests\Feature\User;

use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserTest extends BaseUserTest
{
    public function test_register_new_user(): void
    {
        $token = $this->getToken();

        $response = $this->withHeader('token', $token)
            ->postJson(
                self::ROUTE_USER_STORE,
                $this->getDataRegistration()
            );

        $response->assertStatus(201)
            ->assertJsonStructure(parent::getRegisterUserStructure());
    }

    public function test_returns_list_users(): void
    {
        $response = $this->get(self::ROUTE_USER_INDEX);

        $response->assertOk()
            ->assertJsonStructure(parent::getUsersStructure())
            ->assertJsonCount(5, 'users');
    }

    public function test_returns_ten_users(): void
    {
        $response = $this->get(self::ROUTE_USER_INDEX . '?page=4&count=10');

        $response->assertOk()
            ->assertJsonStructure(parent::getUsersStructure())
            ->assertJsonFragment([
                'page' => 4
            ])
            ->assertJsonCount(10, 'users');
    }

    public function test_page_not_found(): void
    {
        $response = $this->get(self::ROUTE_USER_INDEX . '?page=50');

        $response->assertStatus(self::STATUS_NOT_FOUND)
            ->assertJsonStructure(parent::getErrorNotFoundStructure())
            ->assertJsonFragment(parent::getErrorPageNotFoundFragment());
    }


    private function getDataRegistration(): array
    {
        return [
            'name' => 'Dima',
            'email' => '12345@gmail.com',
            'phone' => '+38022222222',
            'position_id' => 3,
            'photo' => $this->getUploadedFile(),
        ];
    }

    private function getUploadedFile(): File
    {
        Storage::fake('photo');

        return UploadedFile::fake()->image('avatar.jpg');
    }
}
