<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Services\DBConnectionService;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    public function index()
    {

        DBConnectionService::setConnection();
        $events = Event::all();
        return view('index' , compact('events'));
    }

    public function updateService($id)
    {
        DBConnectionService::setConnection();
        $model =  Event::findorFail($id);

        $current_active = $model->Active == "1" ? "0" : "1";


        $model->update([

            'Active' => $current_active
        ]);


        session()->flash('success', 'Event Active has been changed ');
        return redirect()->route('panel.panel-home');
    }
}
