<?php

use App\Notifications\UserNotifications;
use App\UserProject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]] , function () {




    Route::group(['middleware' => 'redirectIfNotAdmin'] , function ()
    {

        Route::group(['prefix' => 'admin' , 'as' => 'dashboard-admin.'] , function ()
        {
            Route::get('/dashboard' , 'HomeController@index')->name('admin-home');
            Route::get('/dashboard/users' , 'HomeController@users')->name('admin-users');
            Route::get('/dashboard/projects' , 'HomeController@projects')->name('admin-projects');
            Route::get('/dashboard/users/verify/{id}' , 'HomeController@verfiyUser')->name('admin-verify-users');


        });


    });


});
