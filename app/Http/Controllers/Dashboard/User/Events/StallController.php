<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\StallRequest;
use App\Models\Events\Stall;
use Illuminate\Http\Request;

class StallController extends Controller
{
    public function index()
    {
        $data = Stall::where('EventKey', 'Stall')->first();
        return view('dashboard.user.events.search.stall', compact('data'));
    }

    public function save(StallRequest $request)
    {
        $validated = $request->validated();

        Stall::updateOrCreate(

            [
                'EventKey' => 'Stall'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'StallItemID' => $request->StallItemID,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );


        session()->flash('success', 'Stall data has been updated');
        return redirect()->route('panel.event-stall');
    }
}
