<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVendor
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
        $user = $request->user();
        if($user->hasRole(\App\Constants\UserRoles::VENDOR)){
            return $next($request);
        }
        else{
            return  redirect()->back();
        }

    }
}
