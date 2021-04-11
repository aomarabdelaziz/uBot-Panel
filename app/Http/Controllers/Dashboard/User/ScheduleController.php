<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Rules\ScheduleRule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {

        $collection = collect(config('events.all'));
        $events = $collection->map(function ($event) {
           return $event = !in_array( $event, config('events.sub_events')) ? $event : null ;
        });



        $eventName = $request->event_name;
        $data = Schedule::SearchByEventKey($eventName)->paginate(6);



        return view('dashboard.user.schedule.index' , compact('events' , 'eventName' , 'data'));
    }

    public function store(Request $request)
    {


        $validate = $request->validate([

            'EventName' => 'required|string',
            'Day' => 'required|string',
            'Time' => ['required' , 'string' , new ScheduleRule($request->Day)]


        ]);


        Schedule::create($request->all());

        session()->flash('success', 'Schedule has been created');
        return redirect()->back();



    }

    public function update(Request $request)
    {


        $validate = $request->validate([

            'EventName' => 'required|string',
            'Day' => 'required|string',
            'Time' => ['required' , 'string' , new ScheduleRule($request->Day)]


        ]);




        $model = Schedule::where('Day' , $request->oldDay)->where('Time' , $request->oldTime)->where('EventName' , $request->EventName)->first();

        $model->update($request->only('Day' , 'Time'));

        session()->flash('success', 'Schedule has been updated');
        return redirect()->back();


    }
    public function destroy($id)
    {


         Schedule::findOrFail($id)->delete();
         session()->flash('success', 'Schedule has been deleted');
         return redirect()->back();

    }
}
