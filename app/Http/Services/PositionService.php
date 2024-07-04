<?php

namespace App\Http\Services;

use App\Exceptions\NotFoundExceptions\PositionsNotFoundException;
use App\Http\Repositories\PositionRepository;
use App\Http\Resources\Positions\PositionCollection;
use Illuminate\Http\JsonResponse;

class PositionService
{
    private PositionRepository $repository;

    public function __construct(PositionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse
     * @throws PositionsNotFoundException
     */
    public function getPositions(): JsonResponse
    {
        $positions = $this->repository->getPositions();

        if (empty($positions)) {
            throw new PositionsNotFoundException();
        }

        return response()->json(new PositionCollection($positions));
    }
}
