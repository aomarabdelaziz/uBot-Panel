<?php

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

    Route::resource('projects', 'AddProjectController');

    Route::group(['middleware' => 'userHasProject'] , function () {

        Route::group(['prefix' => 'dashboard' , 'as' => 'dashboard.'] , function () {

            Route::get('/' , function () {
                return view('index');
            })->name('dashboard-home');

            Route::get('/sql-settings' , 'SqlController@index')->name('sql-settings');
            Route::post('/sql-settings' , 'SqlController@save')->name('sql-settings');

            Route::get('/server-settings' , 'ServerController@index')->name('server-settings');
            Route::post('/server-settings' , 'ServerController@save')->name('server-settings');

            Route::group(['namespace' => 'Events'] , function () {
                Route::get('/events/trivia' , 'TriviaController@index')->name('event-trivia');
                Route::post('/events/trivia' , 'TriviaController@save')->name('event-trivia');
            });


        });




    });

});





Route::get('/test' , function (){

    return \App\UserProject::all();
});

