<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\View;

class CheckAuth
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
        $auth = $request->cookie('auth');
        $user = User::where('remember_token',$auth)->get();

        if($auth != null && count($user) != 0){
            View::share('auth',true);
        }else {
            View::share('auth', false);
        }
        if($request->path() == 'admin' && $auth == null && count($user) == 0){
            return redirect('/login');
        }
        return $next($request);
    }
}
