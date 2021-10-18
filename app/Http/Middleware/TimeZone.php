<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TimeZone
{
    /**
     * クッキーからタイムゾーンを取得して、設定に反映する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $timezone = $request->cookie('timezone') ?? config('app.timezone');

        config()->set('app.user_timezone', $timezone);

        /** @var $response \Illuminate\Http\Response */
        $response = $next($request);
        return $response->cookie('timezone', $timezone, 0, null, null, false, false);
    }
}
