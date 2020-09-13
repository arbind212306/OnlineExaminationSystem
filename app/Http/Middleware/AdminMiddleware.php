<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if((Auth::guard('admin')->user()->admintype == 'superadmin') && 
            (Auth::guard('admin')->user()->is_active = true)){

                return $next($request);
        }else{
            
            return redirect('/home');
        }
        
    }
}
