<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundExceptions\PageNotFoundException;
use App\Exceptions\NotFoundExceptions\UserNotFoundException;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserRequest $request
     * @return JsonResponse
     * @throws PageNotFoundException
     */
    public function index(UserRequest $request): JsonResponse
    {
        return $this->service->getUsers($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param ShowUserRequest $request
     * @return JsonResponse
     * @throws UserNotFoundException
     */
    public function show(ShowUserRequest $request): JsonResponse
    {
        return $this->service->showUser($request->route('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
