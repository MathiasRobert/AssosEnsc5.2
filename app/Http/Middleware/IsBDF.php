<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsBDF
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isBDF()) {
            return $next($request);
        }

        return redirect('/');
    }
}
