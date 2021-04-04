<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RewardRequest;
use App\Models\Reward;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class RewardController extends Controller
{


    public function __construct()
    {
        $this->middleware('eventSearchableExist');
    }

    public function index(Request $request)
    {


        $EVENTS = config('events.rewards');

        $eventName = $request->event_name;

        $data = Reward::SearchByEventKey($eventName)->first();;

        return view('dashboard.user.rewards.index', compact('EVENTS', 'data', 'eventName'));
    }

    public function store(RewardRequest $request)
    {

        $validated = $request->validated();

        Reward::updateOrCreate(

            [
                'EventKey' => $request->event
            ],
            [
                'RewardType' => $request->RewardType,
                'RewardControl' => $request->RewardControl,
                'SilkType' => $request->SilkType,
                'SilkAmount' => $request->SilkAmount,
                'GoldAmount' => $request->GoldAmount,
                'ItemCodeName128' => $request->ItemCodeName128,
                'ItemPlus' => $request->ItemPlus,
                'ItemAmount' => $request->ItemAmount,


            ]

        );


        session()->flash('success', 'Rewards has been updated');
        return redirect()->route('panel.rewards.index');
    }
}
