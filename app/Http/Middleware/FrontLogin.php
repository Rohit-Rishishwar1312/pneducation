<?php

namespace App\Http\Middleware;
use Session;

use Closure;

class FrontLogin
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
        if(empty(Session::has('rohit')))
        {
            return redirect('front/login');
        }
        else{
          return $next($request);  
        }
    }
}
