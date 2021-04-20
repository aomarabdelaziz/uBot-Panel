<?php

namespace App\Http\Controllers\Dashboard\User\Profile;

use App\Http\Controllers\Controller;
use App\Notifications\UserNotifications;
use App\Rules\EGPBalanceRule;
use App\UserBalance;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.user.profile.index');
    }

    public function transfereBalance(Request $request)
    {
        $validate = $request->validate(
            [
                'egp_amount' => ['required' , 'integer' , new EGPBalanceRule($request->egp_amount)],
                'project_name' => ['required' , 'string' , 'exists:user_projects,project_name' ]
            ]);


        $currentUserBalance = auth()->user()->userBalance->balance;
        $transfereEGPAmount = $request->egp_amount;
        $newUserBalance = ($currentUserBalance - $transfereEGPAmount);

        auth()->user()->userBalance->update(
            [
               'balance' =>  $newUserBalance
            ]);


        $userIDProject = UserProject::where('project_name' , $request->project_name)->first();
        $data = UserBalance::find($userIDProject->user_id);

        $data->update(
            [
                'balance' => $transfereEGPAmount + $data->balance
            ]);

        Notification::send(auth()->user() , new UserNotifications('success' , "You have transferred {$transfereEGPAmount} EGP to {$request->project_name}"));

        session()->flash('success' , 'Transfere has been done');
        return redirect()->back();



    }
}
