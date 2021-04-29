<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscordRequest;
use App\Models\Discord;
use Illuminate\Http\Request;

class DiscordController extends Controller
{
    public function index()
    {


        $data = Discord::where('Type' , 'WebHook')->firstOrFail();
        return view('dashboard.user.discord.main' , compact('data'));
    }


    public function store(DiscordRequest $request)
    {



        Discord::updateOrCreate(

            [
                'Type' => 'WebHook'
            ],
            [
                'AutoEvent' => $request->AutoEvent,
                'Global' => $request->Global,
                'Uniques' => $request->Uniques,
                'BotName' => $request->BotName,
                'BotAvatar' => $request->BotAvatar,
                'Service' => $request->Service
            ]
        );
        session()->flash('success', 'Discord data has been updated');
        return redirect()->route('panel.discord.index');


    }
}
