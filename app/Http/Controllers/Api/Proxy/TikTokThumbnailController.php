<?php

namespace App\Http\Controllers\Api\Proxy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TikTokThumbnailController extends Controller
{
    public function get(Request $request)
    {
        $url = $request->get('url');
        $response = Http::get("https://www.tiktok.com/oembed?url=" . urlencode($url));
        $thumbnail_url = $response->json('thumbnail_url');
        return response()->json(compact('thumbnail_url'));
    }
}
