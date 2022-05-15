<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ApiLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!is_null($request->get('locale')) && array_key_exists($request->get('locale'), config('language'))) {
            App::setLocale($request->get('locale'));
        } else {
            App::setLocale('ja');
        }
        return $next($request);
    }
}
