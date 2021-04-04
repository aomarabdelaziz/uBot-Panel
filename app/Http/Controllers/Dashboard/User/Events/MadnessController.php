<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\MadnessRequest;
use App\Models\Events\Madness;
use Illuminate\Http\Request;

class MadnessController extends Controller
{
    public function index()
    {

        $data = Madness::where('EventKey', 'Madness')->first();
        return view('dashboard.user.events.uniques.madness', compact('data'));
    }

    public function save(MadnessRequest $request)
    {

        $validated = $request->validated();

        Madness::updateOrCreate(

            [
                'EventKey' => 'Madness'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'CapeDetection' => $request->CapeDetection,
                'ReqLevel' => $request->ReqLevel,
                'UniqueID' => $request->UniqueID,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Madness data has been updated');
        return redirect()->route('panel.event-madness');

    }
}
