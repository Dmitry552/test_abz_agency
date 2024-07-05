<?php

namespace App\Http\Services;

use App\Exceptions\NotFoundExceptions\PageNotFoundException;
use App\Exceptions\NotFoundExceptions\UserNotFoundException;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\Users\ShowUserResource;
use App\Http\Resources\Users\UserCollection;
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

    /**
     * @param int $id
     * @return JsonResponse
     * @throws UserNotFoundException
     */
    public function showUser(int $id): JsonResponse
    {
        $user = $this->repository->getUserForId($id);

        if (empty($user)) {
            throw new UserNotFoundException();
        }

        return response()->json(new ShowUserResource($user));
    }

    /**
     * @param array $data
     * @return JsonResponse
     * @throws UserNotFoundException
     */
    public function createUser(array $data): JsonResponse
    {
        $user = $this->repository->createUser($data);

        if (empty($user)) {
            throw new UserNotFoundException();
        }

        return response()->json([
            'success' => true,
            'user_id' => $user->id,
            'message' => 'New user successfully registered'
        ], 201);
    }
}
