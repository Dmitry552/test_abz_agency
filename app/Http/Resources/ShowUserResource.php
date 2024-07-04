<?php

namespace App\Http\Resources;

class ShowUserResource extends UserResource
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'user' => parent::toArray($request)
        ];
    }
}
