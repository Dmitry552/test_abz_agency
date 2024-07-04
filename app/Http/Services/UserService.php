<?php

namespace app\Http\Services;

use App\Exceptions\PageNotFoundException;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;

class UserService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return JsonResponse
     * @throws PageNotFoundException
     */
    public function getUsers(array $data): JsonResponse
    {
        $users = $this->repository->getUsers($data);

        if (empty($users->items())) {
            throw new PageNotFoundException();
        }

        return response()->json(new UserCollection($users));
    }
}
