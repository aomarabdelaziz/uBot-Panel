<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchWarpRequest;
use App\Models\SearchHint;
use App\Models\SearchWarp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchWarpHintController extends Controller
{

    public function __construct()
    {
        $this->middleware('eventSearchableExist');
    }
    public function index(Request $request)
    {



        $EVENTS = config('events.search_warps');


        $WarpKeys = SearchWarp::all('WarpKey');

       $all_warps = SearchWarp::when($request->event_name , function ($q) use ($request , $EVENTS) {


           return $q->where('EventKey' , $request->event_name);

       })->when($request->warp_key , function ($q) use ($request) {

           return $q->where('WarpKey' , $request->warp_key);

       })->paginate(10);



        $all_hints = SearchHint::when($request->event_name , function ($q) use ($request , $EVENTS) {


            return $q->where('EventKey' , $request->event_name);

        })->when($request->warp_key , function ($q) use ($request) {

            return $q->where('WarpKey' , $request->warp_key);

        })->paginate(10);





        return view('dashboard.user.events.search.SearchWarpsHints')->with(
            [

                'EVENTS' => $EVENTS ,
                'eventName' => $request->event_name ,
                'all_warps' => $all_warps ,
                'all_hints' => $all_hints,
                'warpKey' => $request->warp_key,
                'WarpKeys' => $WarpKeys

            ]
        );


    }

    public function store(SearchWarpRequest $request)
    {


        $validated = $request->validated();

        SearchWarp::create([

            'WarpKey' => $request->WarpKey,
            'wRegionID' => $request->wRegionID,
            'PosX' => $request->PosX,
            'PosY' => $request->PosY,
            'PosZ' => $request->PosZ,
            'WorldID' => $request->WorldID,
            'EventKey' => $request->event_name,

        ]);

        session()->flash('success', 'Warps & Hints data has been created');
        return redirect()->route('panel.search-warps-hints.index');

    }

    public function update(Request $request , $id)
    {

        $model =  SearchWarp::findorFail($id);
        $request->validate([

            'WarpKey' => ['required', 'string' , 'unique:sqlsrv_user._SearchWarps,WarpKey,'.$id],
            'wRegionID' => ['required', 'integer'],
            'PosX' => ['required', 'string'],
            'PosY' => ['required', 'string'],
            'PosZ' => ['required', 'string'],
            'WorldID' => ['required', 'integer'],


        ]);

        $model->update($request->only('WarpKey' , 'wRegionID' , 'PosX' , 'PosY' , 'PosZ' , 'WorldID'));

        $model->hints()->update($request->only('WarpKey'));

        session()->flash('success', 'Warp settings has been updated ');
        return redirect()->route('panel.search-warps-hints.index');
    }

    public function saveHint(Request $request)
    {
        $request->validate([

            'WarpKey' => ['required' , 'string'],
            'event_name' => ['required' , 'string'],
            'HintMessage' => ['required' , 'string']
        ]);


        $created_hint = SearchHint::create([


            'HintID' => '1',
            "WarpKey" => $request->WarpKey,
            'HintMessage' => $request->HintMessage,
            'EventKey' => $request->event_name

        ]);

        $created_hint->increment('HintID');

        session()->flash('success', 'Warps & Hints data has been created');
        return redirect()->route('panel.search-warps-hints.index');

    }

    public function updateHint(Request $request)
    {

    }

    public function updateService($id)
    {
       $model =  SearchWarp::findorFail($id);

       $current_service = $model->Service == "1" ? "0" : "1";


      $model->update([

           'Service' => $current_service
       ]);


        session()->flash('success', 'Warp Service has been changed ');
        return redirect()->route('panel.search-warps-hints.index');

    }

    public function destroy($warpKey)
    {

        $data = SearchWarp::where('WarpKey' , $warpKey)->firstOrFail();
        $data->delete();
        session()->flash('success', 'Warp has been deleted');

        return redirect()->route('panel.search-warps-hints.index');

    }
}
