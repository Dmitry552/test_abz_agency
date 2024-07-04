<?php

namespace App\Http\Resources\Positions;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PositionCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'positions' => PositionResource::collection($this)
        ];
    }
}
