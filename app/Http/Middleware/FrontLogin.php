<?php

namespace App\Http\Middleware;

use Closure;

class FrontLogin
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
        $guard = auth()->guard('front');

        if ($guard->user()) {
            return $next($request);
        } else {
            return redirect()->route('front::login')->with("info", "Harap login terlebih dahulu.");
        }
    }
}
