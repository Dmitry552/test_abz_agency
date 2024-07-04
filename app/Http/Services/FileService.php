<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    /**
     * @param UploadedFile $photo
     * @return string
     */
    public function saveImage(UploadedFile $photo): string
    {
        $fileName = Str::uuid() . '.' . $photo->extension();
        return Storage::putFileAs('/images', $photo, $fileName);
    }
}
