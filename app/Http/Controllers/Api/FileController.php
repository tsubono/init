<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * 画像アップロード
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        $dir = $request->get('dir');
        $filename = now()->format('YmdHis') . rand(1, 9) . "." . $request->file('img')->extension();
        $path = $request->file('img')->storeAs($dir, $filename, 'public');

        return response()->json([
            'status' => 'ok',
            'path' => Storage::url($path),
            'name' => $request->file('img')->getClientOriginalName(),
        ]);
    }
}
