<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckCustomer
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
        if(Session::get('cart') == '' || Session::get('cart') == null)
        {
            abort('404');
        }
        return $next($request);
    }
}
