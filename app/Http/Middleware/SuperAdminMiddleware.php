<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class SuperAdminMiddleware
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
        
        //$token = JWTAuth::parseToken();
        //$user = $token->authenticate();
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->role == 'admin' or $user->role == 'editor') {
            return $next($request);
        }
        return response()->json([
            'message' => 'You are unauthorized to access this resource',
            'success' => false
        ], 401);
    }
}
