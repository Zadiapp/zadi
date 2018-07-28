<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Middleware\GetUserFromToken;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JWTCheck extends GetUserFromToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = new \App\Http\Controllers\Controller();
        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return $response->getErrorResponse('token_not_provided', null, 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return $response->getErrorResponse('token_expired', null, $e->getStatusCode());
        } catch (JWTException $e) {
            return $response->getErrorResponse('token_invalid', null, $e->getStatusCode());
        }

        if (! $user) {
            return $response->getErrorResponse('user_not_found', null, 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}