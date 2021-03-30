<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\Reward;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarpRequest;
use App\Models\Warp;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class WarpController extends Controller
{

    public function __construct()
    {
        $this->middleware('eventSearchableExist');
    }

    public function index(Request $request)
    {

        $EVENTS = config('events.warps');
        $eventName = $request->event_name;
        $warps = Warp::when($eventName, function ($q) use ($eventName) {

            return $q->where('EventKey' , $eventName);

        })->first();


        return view('dashboard.user.warps.index' , compact('EVENTS' , 'warps' ,'eventName'));
    }

    public function store(WarpRequest $request)
    {


        $validated = $request->validated();
        Warp::updateOrCreate(

            [
                'EventKey' => $request->event
            ],
            [
                'RegionID' => $request->RegionID,
                'PosX' => $request->PosX,
                'PosY' => $request->PosY,
                'PosZ' => $request->PosZ,
                'WorldID' => $request->WorldID,

            ]

        );


        session()->flash('success', 'Warps has been updated');
        return redirect()->route('panel.warps.index');
    }
}
