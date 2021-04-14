<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\UserProject;
use Illuminate\Http\Request;
use \Illuminate\Support\Carbon;

class PremiumController extends Controller
{
    public function index()
    {


        $balance = auth()->user()->userBalance->balance;
        if ($balance >= 400) {
            auth()->user()->userBalance->update(
                [
                    'balance' => $balance - 400
                ]);

            auth()->user()->update(
                [
                    'role' => 'premium'

                ]);

           auth()->user()->projects->update(
                [
                    'start_license' => Carbon::now(),
                    'end_license' => Carbon::now()->addDays(30)

                ]);



            return redirect()->route('panel.panel-home');
        }


        return view('dashboard.user.payment.index');
    }
}
