<?php

namespace App\Http\Controllers\Dashboard\User\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\UniqueRequest;
use App\Models\Events\Unique;
use App\Models\Events\UniqueSettings;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class UniqueController extends Controller
{
    public function index(Request $request)
    {

        $data = Unique::where('EventKey' , 'Uniques')->first();
        $all_uniques = UniqueSettings::SearchByRequestKey($request)->paginate(10);
        return view('dashboard.user.events.uniques.index' , compact('all_uniques' , 'data'));
    }


    public function store(UniqueRequest $request)
    {
        $validated = $request->validated();

        UniqueSettings::create($request->all());
        session()->flash('success', 'Unique has been added');

        return redirect()->route('panel.uniques.index');

    }

    public function update(Request $request , $id)
    {

    }

    public function destroy($id)
    {
        $model = UniqueSettings::find($id);
        $model->delete();
        session()->flash('success', 'Unique has been deleted');

        return redirect()->route('panel.uniques.index');
    }
}
