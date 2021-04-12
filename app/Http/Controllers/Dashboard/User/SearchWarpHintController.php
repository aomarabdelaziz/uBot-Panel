<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveHintRequest;
use App\Http\Requests\SearchWarpRequest;
use App\Models\SearchHint;
use App\Models\SearchWarp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Clue\StreamFilter\fun;

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
        $all_warps = SearchWarp::SearchByEventKey($request , $EVENTS)->paginate(10);;
        $all_hints = SearchHint::SearchByEventKey($request , $EVENTS)->paginate(10);;

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

        try {

          DB::transaction(function () use ($request) {

              DB::connection('sqlsrv_user' )
                  ->update("Exec _SearchWarpHint '$request->event_name' , '$request->WarpKey' , '$request->Charname' , '$request->WorldID' , '$request->HintMessage' , 1 ");


          });

        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('panel.search-warps-hints.index');
        }

        DB::commit();
        session()->flash('success', 'Warps & Hints data has been created');
        return redirect()->route('panel.search-warps-hints.index');

    }

    public function update(Request $request , $id)
    {

        SearchWarp::findorFail($id);
        $request->validate([

            'WarpKey' => ['required', 'string' , 'unique:sqlsrv_user._SearchWarps,WarpKey,'.$id],
            'Charname' => ['required', 'string'],
            'WorldID' => ['required', 'integer'],


        ]);


        try {

            DB::transaction(function () use ($request) {

                DB::connection('sqlsrv_user' )
                    ->update("Exec _SearchWarpHint '' , '$request->WarpKey' , '$request->Charname' , '$request->WorldID' , '' , 2 ");


            });

        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('panel.search-warps-hints.index');
        }


        session()->flash('success', 'Warp settings has been updated ');
        return redirect()->route('panel.search-warps-hints.index');
    }

    public function saveHint(SaveHintRequest $request)
    {



        $count = SearchHint::where('WarpKey' , $request->WarpKey)
            ->where('EventKey' , $request->event_name)
            ->count();

        SearchHint::create([


            'HintID' => $count += 1,
            "WarpKey" => $request->WarpKey,
            'HintMessage' => $request->HintMessage,
            'EventKey' => $request->event_name

        ]);

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

        SearchWarp::where('WarpKey' , $warpKey)->delete();
        SearchHint::where('WarpKey' , $warpKey)->delete();


        session()->flash('success', 'Warp has been deleted');

        return redirect()->back();

    }

    public function destroyHint($id)
    {



       $model = SearchHint::findOrFail($id);

       if((int)$model->HintID !== 1) {
           session()->flash('success', 'Warp hint has been deleted');
           $model->delete();
       }
       else {
           session()->flash('error', 'Cannot delete this warp');
       }




        return redirect()->back();

    }
}
