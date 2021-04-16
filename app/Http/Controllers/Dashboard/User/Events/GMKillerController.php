<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\GMKillerRequest;
use App\Models\Events\GMKiller;
use Illuminate\Http\Request;

class GMKillerController extends Controller
{
    public function index()
    {

        $data = GMKiller::where('EventKey', 'GMKiller')->first();
        return view('dashboard.user.events.others.gmkiller', compact('data'));
    }

    public function save(GMKillerRequest $request)
    {

        $validated = $request->validated();


        GMKiller::updateOrCreate(

            [
                'EventKey' => 'GMKiller'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );
        session()->flash('success', 'GMKiller data has been updated');
        return redirect()->route('panel.event-gmkiller');

    }
}
