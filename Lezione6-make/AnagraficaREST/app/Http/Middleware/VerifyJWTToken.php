<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VerifyJWTToken
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
        // --- logica el middleware
        try {
            // --- inoltra il token e verifica che sia corretto
            $user = JWTAuth::toUser($request->input('token'));

        } catch (JWTException $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['token_expired'], $e->getStatusCode());

            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['token_invalid'], $e->getStatusCode());

            } else {
                return response()->json(['error' => 'Token obbligatorio']);
            }
        }

        // === DOBBIAMO SEMPRE RESTITUIRE QUESTO
        return $next($request);
    }
}
