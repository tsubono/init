<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('App\Http\Controllers\Api')->group(function () {
    Route::post('/upload-image', 'FileController@uploadImage');
    Route::get('/proxy/vimeo-thumbnail/{videoId}', 'Proxy\VimeoThumbnailController@get');
    Route::get('/proxy/tiktok-thumbnail', 'Proxy\TikTokThumbnailController@get');
});
