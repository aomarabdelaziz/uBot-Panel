<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LotterySilkRequest;
use App\Models\Events\LotterySilk;
use Illuminate\Http\Request;

class LotterySilkController extends Controller
{
    public function index()
    {
        $data = LotterySilk::where('EventKey', 'LotterySilk')->first();
        return view('dashboard.user.events.lottery.lotterysilk', compact('data'));
    }

    public function Save(LotterySilkRequest $request)
    {
       $validated = $request->validated();


        LotterySilk::updateOrCreate(

            [
                'EventKey' => 'LotterySilk'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'LotteryAmount' => $request->LotteryAmount,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Lottery Silk data has been updated');
        return redirect()->route('panel.event-lotterysilk');
    }
}
