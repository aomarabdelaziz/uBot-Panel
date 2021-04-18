<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Services\GetEventKeyNoticeService;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $collection = collect(config('events.all'));
        $events = $collection->map(function ($event) {
            return $event = !in_array( $event, config('events.sub_events')) ? $event : null ;
        });


        $eventName = $request->event_name;
        $data = Notice::SearchByEventKey($eventName)->paginate(12);


        $targetEvent = GetEventKeyNoticeService::getEvent($eventName);
        $types = config("messagetype.$targetEvent");




        return view('dashboard.user.notices.index' , compact('events' , 'eventName' , 'data' , 'types'));


    }


    public function update(NoticeRequest $request)
    {

        $model = Notice::findOrFail($request->noticeID);
        $model->update($request->only('EventName' , 'Notice' , 'Type' , 'Time' , 'Discord' , 'NoticeType'));

        session()->flash('success', 'Notice has been updated');
        return redirect()->back();

    }
    public function store(NoticeRequest $request)
    {



        $validate = $request->validated();


        $count = Notice::where('EventKey' , $request->EventName)
            ->where('Type' , $request->Type)
            ->count();


        Notice::create([


            'OrderID' => $count += 1,
            "Notice" => $request->Notice,
            'Type' => $request->Type,
            'Time' => $request->Time,
            'NoticeType' => $request->NoticeType,
            'Discord' => $request->Discord,
            'EventKey' => $request->EventName,


        ]);

        session()->flash('success', 'Notice has been created');
        return redirect()->back();

    }
    public function destroy($id)
    {
        Notice::findOrFail($id)->delete();
        session()->flash('success', 'Notice has been deleted ');
        return redirect()->back();

    }

    public function updateService($id)
    {
        $model =  Notice::findorFail($id);

        $current_service = $model->Service == "1" ? "0" : "1";


        $model->update([

            'Service' => $current_service
        ]);


        session()->flash('success', 'Notice service has been changed ');
        return redirect()->back();

    }
}
