<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Services\DBConnectionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarpRequest;
use App\Models\Warp;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class WarpController extends Controller
{




    public function index(Request $request)
    {

        $EVENTS =
        [
            'LuckyStaller',
            'LuckyCritical',
            'Madness',
            'Uniques',
            'GMKiller',
            'Drunk'
        ];

        DBConnectionService::setConnection();

        $eventName = trim($request->event_name , FILTER_SANITIZE_STRING);

        $warps = Warp::when($eventName, function ($q) use ($eventName) {

            return $q->where('EventKey' , $eventName);

        })->first();



        return view('dashboard.user.warps.index' , compact('EVENTS' , 'warps' ,'eventName'));
    }

    public function store(WarpRequest $request)
    {

        if($request->event === null) {
            return redirect()->route('panel.warps.index');
        }

        $validated = $request->validated();
        DBConnectionService::setConnection();
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
