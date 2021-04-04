<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LotteryCoinsRequest;
use App\Models\Events\LotteryCoins;
use Illuminate\Http\Request;

class LotteryCoinsController extends Controller
{
    public function index()
    {
        $data = LotteryCoins::where('EventKey', 'LotteryCoins')->first();
        return view('dashboard.user.events.lottery.lotterycoins', compact('data'));
    }

    public function Save(LotteryCoinsRequest $request)
    {
         $validated = $request->validated();


        LotteryCoins::updateOrCreate(

            [
                'EventKey' => 'LotteryCoins'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'LotteryAmount' => $request->LotteryAmount,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Lottery Coins data has been updated');
        return redirect()->route('panel.event-lotterycoins');
    }
}
