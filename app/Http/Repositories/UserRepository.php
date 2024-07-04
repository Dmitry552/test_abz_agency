<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository
{
    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function getUsers(array $data): LengthAwarePaginator
    {
        return User::query()->with('position')->paginate($data['count']);
    }
}
