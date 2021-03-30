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


        $eventName = $request->event_name;

        $Events = TrackReward::when($eventName, function ($q) use ($eventName) {

                return $q->where('Event', $eventName);

        })->paginate(50);



        return view('dashboard.user.rewards.track-rewards', compact('EVENTS', 'Events', 'eventName'));
    }
}
