<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
use Omnipay\Omnipay;

class PaypalPaymentController extends Controller
{
    public function handlePayment()
    {



        $response = $this->gateway()->purchase(
            [
                'amount' => 1,
                'currency' => 'usd',
                'description' => 'Abdelaziz Omar',
                'notifyUrl' => route('success.payment'),
                'cancelUrl' => route('cancel.payment'),
                'returnUrl' => route('success.payment'),
            ]
        )->send();


        if($response->isRedirect()) {
            $invoice_id = $response->getTransactionReference();
            $response->redirect();

        }
    }

    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId(config('paypal.live.clientId'));
        $gateway->setSecret(config('paypal.live.secret'));
        $gateway->setTestMode(false);
        return $gateway;
    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');

    }

    public function paymentSuccess(Request $request)
    {

        $response = $this->gateway()->completePurchase(
            [
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]
        )->send();

        $data = $response->getData();


        if($data['state'] === 'approved') {
            return redirect('/done');
        }


    }
}
