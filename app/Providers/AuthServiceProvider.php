<?php

namespace App\Providers;

use App\Models\Events\LuckyStore;
use App\Models\Events\Trivia;
use App\Models\Warp;
use App\Policies\Events\LuckyStorePolicy;
use App\Policies\Events\TriviaPolicy;
use App\Policies\UserAddProjectPolicy;
use App\Policies\WarpPolicy;
use App\UserProject;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        UserProject::class => UserAddProjectPolicy::class,
        Trivia::class => TriviaPolicy::class,
        LuckyStore::class => LuckyStorePolicy::class,
        Warp::class => WarpPolicy::class
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
