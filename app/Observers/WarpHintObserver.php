<?php

namespace App\Observers;

use App\Models\SearchHint;
use App\Models\SearchWarp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarpHintObserver
{
    public function deleting(SearchWarp $searchWarp)
    {
        $searchWarp->hints()->delete();
    }

    public function creating(SearchWarp $searchWarp)
    {


        /*$searchWarp->hints()->create([
            'HintID' => '1',
            "WarpKey" => \request()->input('WarpKey'),
            'HintMessage' => \request()->input('HintMessage'),
            'EventKey' => \request()->input('EventKey')
        ]);*/


        SearchHint::create([


            'HintID' => '1',
            "WarpKey" => \request()->input('WarpKey'),
            'HintMessage' => \request()->input('HintMessage'),
            'EventKey' => \request()->input('event_name')

        ]);




    }
}
