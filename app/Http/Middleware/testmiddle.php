<?php

namespace App\Http\Middleware;

use Closure;

class testmiddle
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
//        // dd(now()->format('s'));
//        if(now()->format('s')% 2) return $next($request);
//        else return response('Not Allowed');
         return $next($request);
    }
}
