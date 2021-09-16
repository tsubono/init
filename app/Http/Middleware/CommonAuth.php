<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CommonAuth
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
        if (auth()->guard('adviser')->check() ||
            auth()->guard('mate')->check() ||
            auth()->guard('admin')->check()
        ) {
            return $next($request);
        }

        if ($request->type === 'adviser') {
            return redirect(route('adviser.login'));
        }

        return redirect(route('mate.login'));
    }
}
