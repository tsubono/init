<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
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
        if (Session::has('locale') && array_key_exists(Session::get('locale'), config('language'))) {
            App::setLocale(Session::get('locale'));
        } else {
            App::setLocale('ja');
        }
        return $next($request);
    }
}
