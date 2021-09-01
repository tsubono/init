<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdviserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('adviser')->check()) {
            return $next($request);
        }

        return redirect(route('adviser.login'));
    }
}
