<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthenticationException;
use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Http\Request;

/**
 * Class CheckKey
 * @package App\Http\Middleware\Api
 */
class CheckKey extends Middleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if (!empty($request->input('token'))) {
            $token = $request->input('token');
        }

        if (!empty($request->bearerToken())) {
            $token = $request->bearerToken();
        }

        if (isset($token) && $token == config('api_key.key')) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
