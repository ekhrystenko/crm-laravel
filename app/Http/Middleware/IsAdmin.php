<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * @param Request $request
     * @return mixed|string
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && !auth()->user()->is_admin) {
            return redirect()->route('welcome');
        }
        if (!auth()->user()->is_admin) {
            return route('login');
        }

        return $next($request);

    }
}