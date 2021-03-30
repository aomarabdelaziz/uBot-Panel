<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LuckyCriticalRequest;
use App\Models\Events\LuckyCritical;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Illuminate\Http\Request;

class LuckyCriticalController extends Controller
{
    public function index()
    {

        $data = LuckyCritical::where('EventKey', 'LuckyCritical')->first();
        return view('dashboard.user.events.lucky.luckycritical', compact('data'));
    }

    public function save(LuckyCriticalRequest $request)
    {

        $validated = $request->validated();

        LuckyCritical::updateOrCreate(

            [
                'EventKey' => 'LuckyCritical'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'CapeDetection' => $request->CapeDetection,
                'CapeType' => $request->CapeType,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'LuckyCritical data has been updated');
        return redirect()->route('panel.event-lc');

    }
}
