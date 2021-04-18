<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\PVPRequest;
use App\Models\Events\PVP;
use Illuminate\Http\Request;

class PVPController extends Controller
{
    public function index()
    {

        $data = PVP::where('EventKey', 'GeneralPVP')->first();
        return view('dashboard.user.events.pvp.general', compact('data'));
    }

    public function save(PVPRequest $request)
    {


        $validated = $request->validated();

        PVP::updateOrCreate(

            [
                'EventKey' => 'GeneralPVP'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'ReqLevel' => $request->ReqLevel,
                'BattleDelay' => $request->BattleDelay,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'PVP data has been updated');
        return redirect()->route('panel.event-pvp');

    }
}
