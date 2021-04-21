<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UserMail;
use App\Mail\UserEmailMailable;
use App\PaypalInvoices;
use App\User;
use App\UserProject;
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
        $latestDonators = PaypalInvoices::orderBy('created_at')->where('state' , 'paid')->limit(5)->get();

        return view('dashboard.admin.index' , compact('usersCount' , 'premiumCount'
        ,'unPremiumCount' , 'incomeUSD' , 'latestMembers' ,'latestDonators'));
    }

    public function users()
    {
        $allMembers = User::with(['projects'])->where('role' , '!=' , 'admin')->get();
        return view('dashboard.admin.users' , compact('allMembers'));

    }

    public function projects()
    {
        $allProjects = UserProject::all();
        return view('dashboard.admin.projects' , compact('allProjects'));
    }

}
