<?php

namespace App\Http\Controllers\Dashboard\User\Settings;

use App\Helpers\ConnectionAvailability;
use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServerRequest;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ServerController extends Controller
{
    public function index()
    {


        $data = UserProject::where('user_id' , auth()->user()->id)->first(['server_host' , 'server_port' , 'server_accountid' , 'server_accountpw' , 'server_charname' , 'server_captcha']);
        return view('dashboard.user.server.index' , compact('data'));

    }

    public function save(ServerRequest $request)
    {

        if(Gate::denies('save' , UserProject::class)) {
            return redirect()->route('panel.panel-home');
        }



        if(!ConnectionAvailability::serverConnectionAvailability($request->server_host, $request->server_port)) {
            session()->flash('error', 'Cannot read any server connection , please make sure that your server connection is correct');
            return redirect()->route('panel.server-settings');
        }




        $validated = $request->validated();

        $model = UserProject::find(auth()->user()->id);
        $model->update($validated);

        session()->flash('success', 'Server data has been updated');
        return redirect()->route('panel.server-settings');

    }
}
