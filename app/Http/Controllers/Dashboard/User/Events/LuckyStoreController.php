<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LuckyStoreRequest;
use App\Models\Events\LuckyStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class LuckyStoreController extends Controller
{
    public function index()
    {

        $data = LuckyStore::where('EventKey', 'LuckyStore')->first();
        return view('dashboard.user.events.lucky.luckystore', compact('data'));
    }

    public function save(LuckyStoreRequest $request)
    {

        $validated = $request->validated();



        LuckyStore::updateOrCreate(

            [
                'EventKey' => 'LuckyStore'
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
        session()->flash('success', 'LuckyStore data has been updated');
        return redirect()->route('panel.event-luckystore');

    }
}
