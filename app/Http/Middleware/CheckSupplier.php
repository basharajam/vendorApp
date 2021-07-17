<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Auth;
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
        $user=Auth::user();
        $userType=$user['userable_type'];
        if( $userType ==="App\Models\Supplier" ){
            return $next($request);
        }
        else{
            return redirect(RouteServiceProvider::SUPPLIER_MANAGER_HOME);
            // return  redirect()->back();
        }

    }
}
