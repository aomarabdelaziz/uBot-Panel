<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\TrackReward;
use App\Services\ConnectionAvailabilityService;
use App\Services\DBConnectionService;
use Illuminate\Http\Request;

class TrackRewardController extends Controller
{

    public function __construct()
    {
        $this->middleware('eventSearchableExist');
    }

    public function index(Request $request)
    {


        $EVENTS = config('events.all');

        unset($EVENTS[1]);
        unset($EVENTS[10]);

        $all_rewards = TrackReward::SearchByEventKey($request);

        return view('dashboard.user.rewards.track-rewards')->with(
            [

                'EVENTS' => $EVENTS ,
                'all_rewards' => $all_rewards ,
                'eventName' => $request->event_name ,
                'charName' => $request->char_name
            ]
        );
    }
}
