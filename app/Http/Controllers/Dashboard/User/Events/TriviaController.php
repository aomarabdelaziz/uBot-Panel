<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\TriviaRequest;
use App\Models\Events\Trivia;
use Illuminate\Support\Facades\Gate;


class TriviaController extends Controller
{

    public function index()
    {
        if(Gate::denies('access' , Trivia::class)) {
            return  redirect()->route('panel.dashboard-home');
        }

        DBConnection::setConnection();
        $data = Trivia::where('EventKey', 'QS')->first();
        return view('dashboard.user.events.trivia.index', compact('data'));
    }

    public function save(TriviaRequest $request)
    {
        if(Gate::denies('access' , Trivia::class)) {
            return  redirect()->route('panel.panel-home');
        }
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
        return redirect()->route('panel.event-trivia');

    }
}
