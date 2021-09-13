<?php

namespace App\Http\Controllers\Api\Proxy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VimeoThumbnailController extends Controller
{
    public function get(string $videoId)
    {
        $response = Http::get("https://vimeo.com/api/v2/video/$videoId.json");
        $thumbnail_url = $response->json('0.thumbnail_large');
        return response()->json(compact('thumbnail_url'));
    }
}
