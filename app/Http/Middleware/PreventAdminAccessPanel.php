<?php

namespace App\Http\Middleware;

use Closure;

class PreventAdminAccessPanel
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
        if(auth()->user()->role == 'admin')
        {
            abort(403 , 'You cannot access this page');
        }
        return $next($request);
    }
}
