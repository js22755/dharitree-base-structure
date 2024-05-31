<?php

namespace App\Services\Middleware;

class UserAccessMiddlewareService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function userAccess()
    {
        return 'this is a middleware test';
    }
}
