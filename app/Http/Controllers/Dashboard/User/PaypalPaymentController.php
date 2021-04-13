<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\EGPBuyList;
use App\Notifications\NotifyUser;
use App\PaypalInvoices;
use App\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PaypalPaymentController extends Controller
{

    public function buy(Request $request)
    {




        $invoice = PaypalInvoices::where( 'user_id' , \auth()->user()->id)
            ->where('state' , PaypalInvoices::STATE_PENDING)->firstOrFail();

        try {
            $response = $this->gateway()->purchase([
                'amount' => $this->formatAmount($invoice->price),
                'currency' => 'usd',
                'description' => \auth()->user()->name,
                'notifyUrl' => route('panel.donate-paypal-notify'),
                'cancelUrl' => route('panel.donate-paypal-error', ['id' => $invoice->id]),
                'returnUrl' => route('panel.donate-paypal-complete'),
            ])->send();
        } catch (\Exception $e) {


            return back()->with('error', $e->getMessage());
        }

        if ($response->isRedirect()) {
            $invoice->payment_id = $response->getTransactionReference();
            $invoice->save();
            $response->redirect();
        }
        return redirect()->back()->with([
            'message' => $response->getMessage(),
        ]);
    }


    public function complete(Request $request)
    {
        $response = $this->gateway()->completePurchase(
            [
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]
        )->send();

        $data = $response->getData();
        $invoice = PaypalInvoices::where('payment_id', $data['id'])->first();

        if ($invoice->state === PaypalInvoices::STATE_PAID) {
            return redirect()->route('panel.donate-paypal-invoice-closed');
        }

        if ($data['state'] === 'approved')
        {
            DB::beginTransaction();
            try
            {
                $user = \auth()->user();
                $currentEGP = UserBalance::find($user->id);
                $old_balance = $currentEGP->balance;
                $currentEGP->increment('balance', $invoice->EGP);

                EGPBuyList::create([
                    'user_id' => $user->id,
                    'old_balance' => $old_balance,
                    'new_balance' => $old_balance+ $invoice->EGP,
                    'BuyQuantity' => $invoice->EGP,
                    'OrderNumber' => $invoice->id,
                    'AuthDate' => Carbon::now()->format('Y-m-d H:i:s'),
                    'SlipPaper' => 'PayPal: ' . $data['id'],
                    'IP' => $request->ip(),
                    'RegDate' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

                $invoice->state = PaypalInvoices::STATE_PAID;
                $invoice->save();


                DB::commit();
                Notification::send($user , new NotifyUser('success' , "Your payment has been processed successfully with {$invoice->EGP} EGP" ));

                return redirect()->route('panel.donate-paypal-success' , ['id'=> $data['id'] , 'package' => $invoice->EGP]);




            }
            catch (\Exception $ex)
            {
                DB::rollback();
                dd($ex->getMessage());
                return redirect()->route('panel.donate-paypal-error')->with('error', $ex->getMessage());
            }

        }
        else
        {
            return redirect()->route('panel.donate-paypal-error');
        }


    }


    public function formatAmount($amount): string
    {
        return number_format($amount, 2, '.', '');
    }

    public function success($id  , $package )
    {
        PaypalInvoices::where('payment_id' , $id)->firstOrFail();
        return view('dashboard.user.payment.success' , compact('id' , 'package'));
    }
    public function closed()
    {
        return view('dashboard.user.payment.closed');
    }

    public function error($id = 0)
    {
        $invoice = PaypalInvoices::where('id', '=', $id)
            ->where('user_id', '=', \auth()->user()->id)
            ->firstOrFail();
        $invoice->state = PaypalInvoices::STATE_CANCELED;
        $invoice->save();

        return view('dashboard.user.payment.error');

    }





    private function gateway()
    {
        $gateway = Omnipay::create('PayPal_Rest');

        $mode = config('paypal.mode');

        if ($mode === 'live') {
            if (config('paypal.live.clientId') && config('paypal.live.secret')) {
                $gateway->setClientId(config('paypal.live.clientId'));
                $gateway->setSecret(config('paypal.live.secret'));
            } else {
                throw new \Exception(__('donations.notification.error.missing-keys'));
            }
        } else {
            if (config('paypal.sandbox.clientId') && config('paypal.sandbox.secret')) {
                $gateway->setClientId(config('paypal.sandbox.clientId'));
                $gateway->setSecret(config('paypal.sandbox.secret'));
            } else {
                throw new \Exception(__('donations.notification.error.missing-keys'));
            }
            $gateway->setTestMode(true);
        }

        return $gateway;
    }





















/*    public function handlePayment()
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


    }*/
}
