<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UserMail;
use App\Mail\UserEmailMailable;
use App\PaypalInvoices;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $usersCount = User::where('role' , '!=' , 'admin')->count();
        $premiumCount = User::where('role' , 'premium')->count();
        $unPremiumCount = User::where('role' , 'user')->count();
        $incomeUSD = PaypalInvoices::where('state' , 'paid')->sum('price');
        $latestMembers = User::orderBy('created_at' , 'desc')->where('role' , '!=' , 'admin')->limit(5)->get();
        $allMembers = User::with(['projects'])->where('role' , '!=' , 'admin')->get();

        return view('dashboard.admin.index' , compact('usersCount' , 'premiumCount'
        ,'unPremiumCount' , 'incomeUSD' , 'latestMembers' ,'allMembers'));
    }

    public function users()
    {
        $allMembers = User::with(['projects'])->where('role' , '!=' , 'admin')->get();
        return view('dashboard.admin.users' , compact('allMembers'));

    }

    public function verfiyUser($id)
    {
        $string = "ahmed";
        $user = User::findOrFail($id);
        $this->dispatch( new UserMail($user->email , "Your payment has been processed successfully with 4000 EGP"));


        return 'Done';
    }

}
