<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LuckyPartyNumberRequest;
use App\Models\Events\LuckyPartyNumber;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Illuminate\Http\Request;

class LuckyPartyNumberController extends Controller
{
    public function index()
    {

        if(!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {
            session()->flash('error', 'Cannot read any sql connection , please make sure that your connection is correct');
            return redirect()->route('panel.panel-home');
        }

        $data = LuckyPartyNumber::where('EventKey', 'LPN')->first();
        return view('dashboard.user.events.lucky.lpn', compact('data'));
    }

    public function save(LuckyPartyNumberRequest $request)
    {

        $validated = $request->validated();
        DBConnectionService::setConnection();


        LuckyPartyNumber::updateOrCreate(

            [
                'EventKey' => 'LPN'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'TargetNumber' => $request->TargetNumber,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'LPN data has been updated');
        return redirect()->route('panel.event-lpn');

    }
}
