<?php

namespace App\Http\Middleware;

use Closure;

class AccessEvent
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
        $role = auth()->user()->role ;

        if($role === 'user') {
            return  redirect()->route('panel.panel-home');
        }
        return $next($request);
    }
}
