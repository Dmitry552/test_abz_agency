<?php

namespace App\Http\Repositories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    /**
     * @return Collection
     */
    public function getPositions(): Collection
    {
        return Position::query()->get();
    }

}
