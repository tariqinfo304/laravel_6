<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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

        if(!session("username"))
        {
            return redirect("login");
        }
       // die("PRe TestMiddleware");
        
        return $next($request);
        //$data = $next($request);

       // print_r($data);
       // die("Post TestMiddleware");
    }
}
