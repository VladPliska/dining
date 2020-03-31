<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\View;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $auth = $request->cookie('auth');

        if($auth != null){
            View::share('auth',true);
        }else {
            View::share('auth', false);
        }
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
    }
}
