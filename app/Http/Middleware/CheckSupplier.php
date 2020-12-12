<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSupplier
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
        if($user->hasRole(\App\Constants\UserRoles::SUPPLIER) ){
            return $next($request);
        }
        else{
            return  redirect()->back();
        }

    }
}
