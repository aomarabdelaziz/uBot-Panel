<?php

namespace App\Http\Middleware;

use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Closure;

class CheckForSQLConnection
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

        if (!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {
            session()->flash('error', 'Cannot read any sql connection , please make sure that your connection is correct');
            return redirect()->route('panel.panel-home');
        }

        return $next($request);
    }
}
