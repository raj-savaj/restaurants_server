<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class check
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
        if(Session::has('admin'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }

    }
}
