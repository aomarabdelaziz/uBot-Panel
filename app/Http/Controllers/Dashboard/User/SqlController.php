<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SqlRequest;
use App\User;
use App\UserProject;
use Illuminate\Http\Request;

class SqlController extends Controller
{
    public function index()
    {


        $data = UserProject::where('user_id' , auth()->user()->id)->first(['sql_host' , 'sql_username' , 'sql_password' , 'db_account' , 'db_shard' , 'db_shardlog']);
        return view('dashboard.user.sql.index' , compact('data'));

    }

    public function save(SqlRequest $request)
    {

        $validated = $request->validated();

        $model = UserProject::find(auth()->user()->id);
        $model->update($validated);

        session()->flash('success', 'SQL data has been updated');
        return redirect()->route('dashboard.sql-settings');

    }
}
