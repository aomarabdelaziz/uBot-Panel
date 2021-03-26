<?php

namespace App\Http\Controllers\Dashboard\User\Settings;

use App\Helpers\ConnectionAvailability;
use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\SqlRequest;
use App\User;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SqlController extends Controller
{
    public function index()
    {


        $data = UserProject::where('user_id' , auth()->user()->id)->first(['sql_host' , 'sql_username' , 'sql_password' , 'db_account' , 'db_shard' , 'db_shardlog']);
        return view('dashboard.user.sql.index' , compact('data'));

    }

    public function save(SqlRequest $request)
    {

        if(Gate::denies('save' , UserProject::class)) {
            return redirect()->route('panel.panel-home');
        }


        if(!ConnectionAvailability::sqlConnectionAvailability($request->sql_host , $request->sql_username , $request->sql_password)) {
            session()->flash('error', 'Cannot read any sql connection , please make sure that your connection is correct');
            return redirect()->route('panel.sql-settings');
        }


        $validated = $request->validated();

        $model = UserProject::find(auth()->user()->id);
        $model->update($validated);

        session()->flash('success', 'SQL data has been updated');
        return redirect()->route('panel.sql-settings');

    }




}
