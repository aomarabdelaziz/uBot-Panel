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

    }
}


