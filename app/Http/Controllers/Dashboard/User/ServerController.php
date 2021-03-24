<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServerRequest;
use App\UserProject;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {


        $data = UserProject::where('user_id' , auth()->user()->id)->first(['server_host' , 'server_port' , 'server_accountid' , 'server_accountpw' , 'server_charname' , 'server_captcha']);
        return view('dashboard.user.server.index' , compact('data'));

    }

    public function save(ServerRequest $request)
    {

        $validated = $request->validated();

        $model = UserProject::find(auth()->user()->id);
        $model->update($validated);

        session()->flash('success', 'Server data has been updated');
        return redirect()->route('dashboard.server-settings');

    }
}
