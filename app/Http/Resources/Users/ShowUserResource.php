<?php

namespace App\Http\Resources\Users;

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
