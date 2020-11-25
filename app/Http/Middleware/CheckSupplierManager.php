<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSupplierManager
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
        if($user->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER)){
            return $next($request);
        }
        else{
            return  redirect()->back();
        }
    }
}
