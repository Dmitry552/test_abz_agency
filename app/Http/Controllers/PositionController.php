<?php

namespace App\Http\Controllers;

use App\Exceptions\PositionsNotFoundException;
use App\Http\Services\PositionService;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    private PositionService $service;

    public function __construct(PositionService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     * @throws PositionsNotFoundException
     */
    public function index(): JsonResponse
    {
        return $this->service->getPositions();
    }
}
