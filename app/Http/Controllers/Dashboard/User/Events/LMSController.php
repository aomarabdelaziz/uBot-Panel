<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\LMS;
use App\Http\Requests\Events\LMSRequest;


class LMSController extends Controller
{
    public function index()
    {

        $data = LMS::where('EventKey', 'LMS')->first();
        return view('dashboard.user.events.pvp.lms', compact('data'));
    }

    public function save(LMSRequest $request)
    {

        $validated = $request->validated();

        LMS::updateOrCreate(

            [
                'EventKey' => 'LMS'
            ],
            [
                'RegKey' => $request->RegKey,
                'MinPlayers' => $request->MinPlayers,
                'MaxPlayers' => $request->MaxPlayers,
                'CapeDetection' => $request->CapeDetection,
                'ReqLevel' => $request->ReqLevel,
                'LMSPlayMethod' => $request->LMSPlayMethod,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'LMS data has been updated');
        return redirect()->back();

    }
}
