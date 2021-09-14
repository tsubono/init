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

    Route::post('/paypal/order-capture', 'PaypalController@orderCapture');

    Route::get('/proxy/vimeo-thumbnail/{videoId}', 'Proxy\VimeoThumbnailController@get');
    Route::get('/proxy/tiktok-thumbnail', 'Proxy\TikTokThumbnailController@get');

    Route::get('/lessons/search', 'Lessons\SearchController@index');
});
