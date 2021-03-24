<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\TriviaRequest;
use App\Models\Events\Trivia;


class TriviaController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $this->authorize('access' , Trivia::class);

        DBConnection::setConnection();
        $data = Trivia::where('EventKey', 'QS')->first();
        return view('events.trivia.index', compact('data'));
    }

    public function save(TriviaRequest $request)
    {
        $this->authorize('access' , Trivia::class);
        $validated = $request->validated();
        DBConnection::setConnection();



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
        return redirect()->route('dashboard.event-trivia');

    }
}
