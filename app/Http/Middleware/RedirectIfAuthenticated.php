<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                //By Blaxk
                $user=Auth::user();
                $userType=$user['userable_type'];
                if( $userType ==="App\Models\Supplier" ){
                    return redirect(RouteServiceProvider::SUPPLIER_HOME);
                }
                elseif( $userType ==="App\Models\SupplierManager"){
                    return redirect(RouteServiceProvider::SUPPLIER_MANAGER_HOME);
                }
                //return redirect(RouteServiceProvider::SUPPLIER_HOME);
            }
        }

        return $next($request);
    }
}
