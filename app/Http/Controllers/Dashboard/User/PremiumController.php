<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function index()
    {

        $balance = auth()->user()->userBalance->balance;
        if($balance >= 400)
        {
            auth()->user()->userBalance->update(
                [
                   'balance' => $balance - 400
                ]);

           auth()->user()->update(
               [
                  'role' => 'premium'
               ]);


            return redirect()->route('panel.panel-home');
        }



        return view('dashboard.user.payment.index');
    }
}
