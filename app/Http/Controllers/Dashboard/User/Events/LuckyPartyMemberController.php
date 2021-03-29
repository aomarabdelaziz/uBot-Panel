<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LuckyPartyMemberRequest;
use App\Models\Events\LuckyPartyMember;
use App\Models\Events\LuckyStore;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Illuminate\Http\Request;

class LuckyPartyMemberController extends Controller
{
    public function index()
    {

        if(!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {
            session()->flash('error', 'Cannot read any sql connection , please make sure that your connection is correct');
            return redirect()->route('panel.panel-home');
        }

        $data = LuckyPartyMember::where('EventKey', 'LPM')->first();
        return view('dashboard.user.events.lucky.lpm', compact('data'));
    }

    public function save(LuckyPartyMemberRequest $request)
    {

        $validated = $request->validated();
        DBConnectionService::setConnection();


        LuckyStore::updateOrCreate(

            [
                'EventKey' => 'LPM'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'PreventAfterLimit' => $request->PreventAfterLimit,
                'WinLimit' => $request->WinLimit,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'LPM data has been updated');
        return redirect()->route('panel.event-lpm');

    }
}
