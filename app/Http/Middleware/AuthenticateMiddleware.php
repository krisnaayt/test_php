<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!Auth::user()){
            return redirect('/auth');
        } else{
            return $next($request);
        }
    }
}
