<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Http\Request;

class locale
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

        if(session()->has('locale')){
			
            // var_dump(session()->get('locale'));
            App::setLocale(session()->get('locale'));
            return $next($request);
            
            
            
        }
        else{

            session()->put('locale','en');
            App::setLocale('en');

            return  redirect('/');

        }
    }
}
