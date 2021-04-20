<?php

use App\Jobs\UserMail;
use App\Notifications\UserNotifications;
use App\User;
use App\UserProject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Mail\UserEmailMailable;
use App\PaypalInvoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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


    Auth::routes(['verify' => true]);

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



        $user = User::findOrFail(1);
        dispatch( new UserMail($user->email , "Your payment has been processed successfully with 4000 EGP"));
        return 'Done';



        /*  $users = UserProject::
          whereBetween('end_license' , [\Illuminate\Support\Carbon::now() , \Illuminate\Support\Carbon::now()->addDays(7)])
              ->get();*/


        $user = UserProject::where('project_name' , 'Fembria')->first();

        return  date('y-m-d') >= date('y-m-d', strtotime($user->end_license));



        //Notification::send($users , new NotifyUser('success' , 'membership'));

        return $users;

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
