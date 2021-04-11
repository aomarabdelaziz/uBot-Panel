<?php

namespace App\Providers;

use App\Http\ViewComposers\ProjectNameComposer;
use App\Http\ViewComposers\SqlConnectionAvailabilityComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('includes.sidebar' , ProjectNameComposer::class);
       view()->composer('index' , SqlConnectionAvailabilityComposer::class);



    }
}
