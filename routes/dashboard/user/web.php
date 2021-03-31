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

        Route::group(['prefix' => 'panel' , 'as' => 'panel.'] , function () {

            Route::get('/' , function () {
                return view('index');
            })->name('panel-home');

            Route::group(['middleware' => 'accessEvent'] , function () {



                Route::group(['namespace' => 'Settings' ] , function () {
                    Route::get('/sql-settings' , 'SqlController@index')->name('sql-settings');
                    Route::post('/sql-settings' , 'SqlController@save')->name('sql-settings');

                    Route::get('/server-settings' , 'ServerController@index')->name('server-settings');
                    Route::post('/server-settings' , 'ServerController@save')->name('server-settings');
                });


                Route::group(['middleware' => 'sqlConnection'] , function () {


                    Route::group(['namespace' => 'Events' , 'middleware' => 'sqlConnection' ] , function () {

                        Route::get('/events/trivia' , 'TriviaController@index')->name('event-trivia');
                        Route::post('/events/trivia' , 'TriviaController@save')->name('event-trivia');

                        Route::get('/events/lucky-store' , 'LuckyStoreController@index')->name('event-luckystore');
                        Route::post('/events/lucky-store' , 'LuckyStoreController@save')->name('event-luckystore');

                        Route::get('/events/lpn' , 'LuckyPartyNumberController@index')->name('event-lpn');
                        Route::post('/events/lpn' , 'LuckyPartyNumberController@save')->name('event-lpn');

                        Route::get('/events/lpm' , 'LuckyPartyMemberController@index')->name('event-lpm');
                        Route::post('/events/lpm' , 'LuckyPartyMemberController@save')->name('event-lpm');

                        Route::get('/events/lucky-critical' , 'LuckyCriticalController@index')->name('event-lc');
                        Route::post('/events/lucky-critical' , 'LuckyCriticalController@save')->name('event-lc');



                        Route::get('/events/hide-and-seek' , 'HideAndSeekController@index')->name('event-hidenseek');
                        Route::post('/events/hide-and-seek' , 'HideAndSeekController@save')->name('event-hidenseek');

                        Route::get('/events/search-and-destroy' , 'SearchAndDestroyController@index')->name('event-searchndestroy');
                        Route::post('/events/search-and-destroy' , 'SearchAndDestroyController@save')->name('event-searchndestroy');

                        Route::get('/events/stall' , 'StallController@index')->name('event-stall');
                        Route::post('/events/stall' , 'StallController@save')->name('event-stall');



                    });


                    Route::resource('warps' , 'WarpController');
                    Route::resource('rewards' , 'RewardController');
                    Route::resource('track-rewards' , 'TrackRewardController');
                    Route::resource('search-warps-hints' , 'SearchWarpHintController');
                    Route::post('search-warps-hints/add-hint' , 'SearchWarpHintController@saveHint')->name('search-warps-add-hints');


                });


            });


        });




    });

});





Route::get('/test' , function () {

    \App\Services\DBConnectionService::setConnection();
//   return \App\Models\SearchWarp::whereHas('hints' , function ($q)
//    {
//        return $q->where('EventKey' , 'Hide And Seek');
//
//    })->get();


    return \App\Models\SearchWarp::with('hints')->get();


/*    return \App\Models\SearchHint::whereHas('warps' , function ($q)
    {
        return $q->where('EventKey' , 'Hide And Seek');

    })->get();*/



});
