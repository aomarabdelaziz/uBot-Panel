<?php

namespace App\Http\Middleware;

use Closure;

class EventSearchableExist
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


        $EVENTS = config('events.all');
        array_push($EVENTS, 'Hide And Seek' , 'Search And Destroy' , 'Stall');
        if(!in_array($request->event_name , $EVENTS) && $request->has('event_name') ){

            return redirect()->back();
        }
        return $next($request);
    }
}
