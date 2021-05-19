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

        if($userGroup == 'admin'){
            return $next($request);
        }
        if($userGroup == 'admin_surat' and ($segment1 == 'suratPanjar' or $segment1 == 'suratReport')){
            return $next($request);
        }elseif($userGroup == 'admin_emus' and ($segment1 == 'berkasPerkara' or $segment1 == 'perkaraReport')){
            return $next($request);
        }else{
            return abort(401);
        }
    }
}
