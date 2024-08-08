<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (request()->is('dashboard') || request()->is('dashboard/*')){
            return $request->expectsJson() ? null : route('dashboard.login');
        }else{
            return $request->expectsJson() ? null : route('login');
        }
    }
}
