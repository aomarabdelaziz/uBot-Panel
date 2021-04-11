<?php

use Illuminate\Support\Facades\Gate;
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


    Route::get(
        '/',
        function () {
            return view('welcome');
        }
    );
    Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');


    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('handle-payment', 'PaypalPaymentController@handlePayment')->name('make.payment');
    Route::get('cancel-payment', 'PaypalPaymentController@paymentCancel')->name('cancel.payment');
    Route::get('/complete', 'PaypalPaymentController@paymentSuccess')->name('success.payment');



    Route::get('/notification-center' , 'Dashboard\User\NotificaionCenterController@index');

    Route::get('/done', function () {




      //  \Illuminate\Support\Facades\Notification::send(auth()->user() , new \App\Notifications\NotifyUser());


      /*  if(!Gate::allows('access-actions')) {




        }
        else {
           $time = auth()->user()->projects->end_license;
          //  return $time->toDateTimeString();


            $time = strtotime($time);
            return date( 'y-m-d' , $time);
           return date('y-m-d');
            return $time->toDateTimeString();
            return  \Carbon\Carbon::now();
        }*/
    });


});
