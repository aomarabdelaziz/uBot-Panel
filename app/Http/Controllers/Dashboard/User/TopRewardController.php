<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RewardRequest;
use App\Models\TopReward;
use Illuminate\Http\Request;

class TopRewardController extends Controller
{
    public function __construct()
    {
        $this->middleware('eventSearchableExist');
    }
    public function index(Request $request)
    {


        $EVENTS = config('events.topRewards');

        $eventName = $request->event_name;

        $data = TopReward::SearchByEventKey($eventName)->get();


        return view('dashboard.user.rewards.top-reward', compact('EVENTS', 'data', 'eventName'));
    }

    public function store(RewardRequest $request)
    {

        $count = TopReward::where('EventKey' , $request->event)->count();

        TopReward::create([


            'TopWinner' => $count += 1,
            'RewardType' => $request->RewardType,
            'RewardControl' => $request->RewardControl,
            'SilkType' => $request->SilkType,
            'SilkAmount' => $request->SilkAmount,
            'GoldAmount' => $request->GoldAmount,
            'ItemCodeName128' => $request->ItemCodeName128,
            'ItemPlus' => $request->ItemPlus,
            'ItemAmount' => $request->ItemAmount,
            'EventKey' => $request->event

        ]);

        session()->flash('success', 'Rewards has been updated');
        return redirect()->route('panel.top-rewards.index');
    }
    public function destroy($eventKey)
    {

        $model = TopReward::where('EventKey' , $eventKey)->delete();
        session()->flash('success', 'Rewards has been deleted');
        return redirect()->route('panel.top-rewards.index');
    }
}
