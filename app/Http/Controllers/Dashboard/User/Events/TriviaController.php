<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\TriviaRequest;
use App\Models\Events\Trivia;
use Illuminate\Support\Facades\Gate;


class TriviaController extends Controller
{

    public function index()
    {

        $data = Trivia::where('EventKey', 'QS')->first();
        return view('dashboard.user.events.trivia.index', compact('data'));
    }

    public function save(TriviaRequest $request)
    {

        $validated = $request->validated();


        Trivia::updateOrCreate(

            [
                'EventKey' => 'QS'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'SendAnswer' => $request->SendAnswer,
                'PreventAfterLimit' => $request->PreventAfterLimit,
                'WinLimit' => $request->WinLimit,
                'InCorrentLimit' => $request->InCorrentLimit,
                'PreventPlayerJoinInSameIPOrHwid' => $request->PreventPlayerJoinInSameIPOrHwid,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'Trivia data has been updated');
        return redirect()->route('panel.event-trivia');

    }
}
