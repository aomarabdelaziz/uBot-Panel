<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\LuckyStoreRequest;
use App\Models\Events\LuckyStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LuckyStoreController extends Controller
{
    public function index()
    {
        if(Gate::denies('access' , LuckyStore::class)) {
            return  redirect()->route('panel.dashboard-home');
        }

        DBConnection::setConnection();
        $data = LuckyStore::where('EventKey', 'LuckyStore')->first();
        return view('dashboard.user.events.lucky.luckystore', compact('data'));
    }

    public function save(LuckyStoreRequest $request)
    {

        if(Gate::denies('access' , LuckyStore::class)) {
            return  redirect()->route('panel.panel-home');
        }

        $validated = $request->validated();
        DBConnection::setConnection();

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
