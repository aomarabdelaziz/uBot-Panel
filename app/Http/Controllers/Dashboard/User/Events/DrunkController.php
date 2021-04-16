<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\DrunkRequest;
use App\Models\Events\Drunk;
use Illuminate\Http\Request;

class DrunkController extends Controller
{
    public function index()
    {

        $data = Drunk::where('EventKey', 'Drunk')->first();
        return view('dashboard.user.events.others.drunk', compact('data'));
    }

    public function save(DrunkRequest $request)
    {

        $validated = $request->validated();

        Drunk::updateOrCreate(

            [
                'EventKey' => 'Drunk'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'ReqLevel' => $request->ReqLevel,
                'UniqueID' => $request->UniqueID,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Drunk data has been updated');
        return redirect()->route('panel.event-drunk');

    }
}
