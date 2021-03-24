<?php

namespace App\Providers;

use App\Models\Events\Trivia;
use App\Policies\Events\TriviaPolicy;
use App\Policies\UserAddProjectPolicy;
use App\UserProject;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
            UserProject::class =>  UserAddProjectPolicy::class,
            Trivia::class => TriviaPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
