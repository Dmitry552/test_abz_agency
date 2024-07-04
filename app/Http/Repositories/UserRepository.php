<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getUsers(array $data): LengthAwarePaginator
    {
        return User::query()->paginate($data['count']);
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function getUserForId(int $id): Model | null
    {
        return User::query()->find($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function createUser(array $data): Model
    {
        return User::query()->create($data);
    }
}
