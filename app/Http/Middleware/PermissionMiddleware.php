<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
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
        $userGroup = Auth::user()->user_group;

        $segment1 = request()->segment(1);

        if($userGroup == 'admin_surat' and $segment1 == 'suratPanjar'){
            return $next($request);
        }elseif($userGroup == 'admin_emus' and $segment1 == 'emus'){
            return $next($request);
        }else{
            return abort(401);
        }
    }
}
