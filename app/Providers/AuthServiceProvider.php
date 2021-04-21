<?php

namespace App\Providers;

use App\Models\Events\LuckyStore;
use App\Models\Events\Trivia;
use App\Models\Warp;
use App\Policies\Events\LuckyStorePolicy;
use App\Policies\Events\TriviaPolicy;
use App\Policies\UserAddProjectPolicy;
use App\Policies\WarpPolicy;
use App\User;
use App\UserProject;
use Carbon\Carbon;
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
        UserProject::class => UserAddProjectPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-event' , function (User $user) {

            return Carbon::now()->format('y-m-d') < Carbon::parse($user->projects->end_license)->format('y-m-d') || $user->role == 'admin';

        });

    }
}
