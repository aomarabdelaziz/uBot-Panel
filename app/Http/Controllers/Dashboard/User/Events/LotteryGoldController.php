<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LotteryGoldRequest;
use App\Models\Events\LotteryGold;
use Illuminate\Http\Request;

class LotteryGoldController extends Controller
{
    public function index()
    {
        $data = LotteryGold::where('EventKey', 'LotteryGold')->first();
        return view('dashboard.user.events.lottery.lotterygold', compact('data'));
    }

    public function Save(LotteryGoldRequest $request)
    {
        $validated = $request->validated();


        LotteryGold::updateOrCreate(

            [
                'EventKey' => 'LotteryGold'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'LotteryAmount' => $request->LotteryAmount,
                'InTown' => $request->InTown,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Lottery Gold data has been updated');
        return redirect()->route('panel.event-lotterygold');
    }
}
