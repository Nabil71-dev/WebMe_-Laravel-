<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Userauth
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
        if(!Session()->has('userloginId')){
            return redirect('homePage')->with('user_login','You have to login first');;
        }
        return $next($request);
    }
}
