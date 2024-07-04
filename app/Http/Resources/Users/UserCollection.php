<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\ResourceCollection;


class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),
            'total_users' => $this->total(),
            'count' => $this->count(),
            'links' => [
                'next_url' => $this->nextUrl(),
                'prev_url' => $this->prevUrl(),
            ],
            'users' => UserResource::collection($this),
        ];
    }

    private function nextUrl()
    {
        $nextPageUrl = $this->nextPageUrl();
        return isset($nextPageUrl) ? $nextPageUrl . '&count=' . $this->count() : $nextPageUrl;
    }

    private function prevUrl()
    {
        $prevPageUrl = $this->previousPageUrl();
        return isset($prevPageUrl) ? $prevPageUrl . '&count=' . $this->count() : $prevPageUrl;
    }
}
