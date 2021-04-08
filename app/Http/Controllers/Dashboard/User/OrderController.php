<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\ProjectStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function startBot()
    {


        $user_Project = auth()->user()->projects->project_name;
        $status = ProjectStatus::where('project_name' , $user_Project)->first();

        if($status->status !== "offline") {

            session()->flash('error', 'Bot aleardy active');
            return redirect()->route('panel.panel-home');
        }

        Order::updateOrCreate([

            'project_name' => $user_Project,
            'order_key' => 'Launch',
            'services' => '0'
        ]);

        session()->flash('success', 'Bot is being to be started');
        return redirect()->route('panel.panel-home');

    }

    public function restartBot()
    {

        $user_Project = auth()->user()->projects->project_name;
        $status = ProjectStatus::where('project_name' , $user_Project)->first();
        if($status->status !== "online") {

            session()->flash('error', 'Bot aleardy in-active, cannot restart in active bot');
            return redirect()->route('panel.panel-home');
        }

        Order::updateOrCreate([

            'project_name' => $user_Project,
            'order_key' => 'Restart',
            'services' => '0'
        ]);

        session()->flash('success', 'Bot is being to be restart');
        return redirect()->route('panel.panel-home');
    }

    public function closeBot()
    {


        $user_Project = auth()->user()->projects->project_name;
        $status = ProjectStatus::where('project_name' , $user_Project)->first();
        if($status->status !== "online") {

            session()->flash('error', 'Bot aleardy in-active');
            return redirect()->route('panel.panel-home');
        }

        Order::updateOrCreate([

            'project_name' => $user_Project,
            'order_key' => 'Shutdown',
            'services' => '0'
        ]);

        session()->flash('success', 'Bot is being to be close');
        return redirect()->route('panel.panel-home');
    }
}
