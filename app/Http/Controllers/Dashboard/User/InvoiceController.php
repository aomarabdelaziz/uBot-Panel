<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\PaypalInvoices;
use App\Services\PackagePrice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {


        $request->validate(
            [
                'package' => ['required', 'integer']
            ]);


        $invoice = PaypalInvoices::where('user_id', auth()->user()->id)
            ->where('state', PaypalInvoices::STATE_PENDING)
            ->first();

        $Amount = $invoice->EGP ?? $request->package;
        $Price = PackagePrice::getPackagePrice($Amount);
        $PaypalFees = PaypalInvoices::PAYPAL_FEES;
        $Total = ($Price + $PaypalFees);

        if (!$invoice) {

            $invoice = PaypalInvoices::firstOrCreate([
                'user_id' => auth()->user()->id,
                'payment_id' => '',
                'name' => auth()->user()->name,
                'price' => $Total,
                'EGP' => $Amount,
                'state' => PaypalInvoices::STATE_PENDING,
            ]);
        }


        return view('dashboard.user.payment.invoice',
            compact('Amount', 'Price', 'PaypalFees', 'invoice', 'Total'));
    }

    public function cancel()
    {
        PaypalInvoices::findorFail(auth()->user()->id)->delete();
        session()->flash('success', 'Payment has been deleted');
        return redirect()->route('panel.panel-home');
    }
}
