<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\HideAndSeekRequest;
use App\Models\Events\HideAndSeek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HideAndSeekController extends Controller
{
    public function index()
    {
        $data = HideAndSeek::where('EventKey', 'HnS')->first();
        return view('dashboard.user.events.search.HideAndSeek', compact('data'));
    }

    /**
     * @param HideAndSeekRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(HideAndSeekRequest $request)
    {
        $validated = $request->validated();



        HideAndSeek::updateOrCreate(

            [
                'EventKey' => 'HnS'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'WinLimit' => $request->WinLimit,
                'PreventAfterLimit' => $request->PreventAfterLimit,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );

        session()->flash('success', 'HideAndSeek data has been updated');
        return redirect()->route('panel.event-hidenseek');
    }
}
