<?php

namespace App\Http\Resources\Users;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position->name,
            'position_id' => $this->position->id,
            'registration_timestamp' => Carbon::parse($this->created_at)->timestamp,
            'photo' => $this->photo ? Storage::url($this->photo) : null
        ];
    }
}
