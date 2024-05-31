<?php

namespace App\Http\Middleware;

use App\Services\Middleware\UserAccessMiddlewareService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $user_access;
    public function __construct(UserAccessMiddlewareService $user_access)
    {
        $this->user_access = $user_access;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $request->mid_test = $this->user_access->userAccess();

        return $next($request);
    }
}
