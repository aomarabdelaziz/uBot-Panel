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
use Illuminate\Support\Facades\Http;

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



    Route::view('/docs' , 'docs.index')->name('ubot-doc');
    Auth::routes(['verify' => true]);

    Route::get(
        '/',
        function () {
            return redirect()->route('panel.panel-home');
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



        $response = Http::get('https://opentdb.com/api.php',
            [
                'amount' => 1
            ])['results'];



        return $response[0];


    });


});
