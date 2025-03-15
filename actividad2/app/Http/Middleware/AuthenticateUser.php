<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if ($request->bearerToken()) {
            $token = PersonalAccessToken::findToken($request->bearerToken());

            if ($token && $token->tokenable) {
                auth()->setUser($token->tokenable);
                return $next($request);
            }
        }

        return parent::handle($request, $next, ...$guards);
    }
}
