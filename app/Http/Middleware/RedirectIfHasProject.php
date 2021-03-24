<?php

namespace App\Http\Middleware;

use App\UserProject;
use Closure;

class RedirectIfHasProject
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
        $has_project =  UserProject::userHasProject();
        if($has_project) {

            return redirect()->route('dashboard.dashboard-home');
        }

        return $next($request);
    }
}
