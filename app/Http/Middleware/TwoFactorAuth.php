<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class TwoFactorAuth
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


        if((bool)auth()->user()->allow_google2fa)
        {
            $authenticator = app(Authenticator::class)->boot($request);

            if ($authenticator->isAuthenticated()) {
                return $next($request);
            }

            return $authenticator->makeRequestOneTimePasswordResponse();
        }

        return $next($request);


    }
}
