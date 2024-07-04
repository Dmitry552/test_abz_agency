<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundExceptions\PageNotFoundException;
use App\Exceptions\NotFoundExceptions\UserNotFoundException;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\FileService;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private UserService $service;
    private FileService $fileService;

    public function __construct(UserService $service, FileService $fileService)
    {
        $this->service = $service;
        $this->fileService = $fileService;
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
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     * @throws UserNotFoundException
     */
    public function store(RegisterUserRequest $request): JsonResponse
    {
        $photo = $request->photo;
        $data = $request->all();

        $path = $this->fileService->saveImage($photo);
        $data['photo'] = $path;

        return $this->service->createUser($data);
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
}
