<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\SurvivalRequest;
use App\Models\Events\Survival;
use Illuminate\Http\Request;

class SurvivalController extends Controller
{
    public function index()
    {

        $data = Survival::where('EventKey', 'Survival')->first();
        return view('dashboard.user.events.pvp.survival', compact('data'));
    }

    public function save(SurvivalRequest $request)
    {

        $validated = $request->validated();

        Survival::updateOrCreate(

            [
                'EventKey' => 'Survival'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'ReqLevel' => $request->ReqLevel,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'PPEarnPointsByTime' => $request->PPEarnPointsByTime,
                'PPEarnPointsDelay' => $request->PPEarnPointsDelay,
                'PPEarnPointsFromCharname' => $request->PPEarnPointsFromCharname,
                'PPEarnPointsFromCharnameTarget' => $request->PPEarnPointsFromCharnameTarget,
                'FEventByPoints' => $request->FEventByPoints,
                'FEventTargetPoints' => $request->FEventTargetPoints,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Survival data has been updated');
        return redirect()->back();

    }
}
