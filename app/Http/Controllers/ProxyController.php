<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProxyController extends Controller
{
    public function handle(Request $request)
    {
        $api_key = env('IMAGE_OPTIM');
        $url = "https://im2.io/{$api_key}/70x70,crop";

        $formData = [];
        foreach ($request->allFiles() as $key => $file) {
            $formData[$key] = fopen($file->getPathname(), 'r');
        }

        foreach ($request->all() as $key => $value) {
            if (!isset($formData[$key])) {
                $formData[$key] = $value;
            }
        }

        $response = Http::asMultipart()->post($url, $formData);

        return response($response->body(), $response->status())
            ->header('Content-Type', $response->header('Content-Type'));
    }
}
