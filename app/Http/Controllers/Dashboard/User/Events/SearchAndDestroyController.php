<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\SearchAndDestroyRequest;
use App\Models\Events\SearchAndDestroy;
use Illuminate\Http\Request;

class SearchAndDestroyController extends Controller
{
    public function index()
    {
        $data = SearchAndDestroy::where('EventKey', 'SnD')->first();
        return view('dashboard.user.events.search.SearchAndDestroy', compact('data'));
    }

    public function save(SearchAndDestroyRequest $request)
    {
        $validated = $request->validated();

        SearchAndDestroy::updateOrCreate(

            [
                'EventKey' => 'SnD'
            ],
            [
                'MaxRounds' => $request->MaxRounds,
                'UniqueID' => $request->UniqueID,
                'Delay1' => $request->Delay1,
                'Delay2' => $request->Delay2,
            ]
        );


        session()->flash('success', 'SearchAndDestroy data has been updated');
        return redirect()->route('panel.event-searchndestroy');
    }
}
