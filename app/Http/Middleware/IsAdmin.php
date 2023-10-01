<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class IsAdmin
 * @package App\Http\Middleware
 */
class IsAdmin
{
    /**
     * @param Request $request
     * @return mixed|string
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->is_admin) {
            return redirect()->route('welcome');
        }

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return $next($request);

    }
}
