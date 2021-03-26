<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Helpers\DBConnection;
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

        DBConnection::setConnection();
        $warps = Warp::when($request->event_name , function ($q) use ($request) {

            return $q->where('EventKey' , $request->event_name);

        })->first();

        $eventName = $request->event_name;
        return view('dashboard.user.warps.index' , compact('EVENTS' , 'warps' ,'eventName'));
    }

    public function store(WarpRequest $request)
    {


        if(Gate::denies('save' , Warp::class)) {
            return redirect()->route('panel.panel-home');
        }

        if($request->event === null) {
            return redirect()->route('panel.warps.index');
        }


        $validated = $request->validated();
        DBConnection::setConnection();
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
