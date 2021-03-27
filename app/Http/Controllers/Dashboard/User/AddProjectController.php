<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Helpers\ConnectionAvailability;
use App\Helpers\DBConnection;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddProjectRequest;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Console\Input\Input;

class AddProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('redirectIfHasProject');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddProjectRequest $request)
    {

        if(Gate::denies('create' , UserProject::class)) {
            return  redirect()->route('panel.panel-home');
        }


        if(!ConnectionAvailability::sqlConnectionAvailability($request->sql_host , $request->sql_username , $request->sql_password)) {
            session()->flash('error', 'Cannot read any sql connection , please make sure that your connection is correct');
            return redirect()->route('projects.index')->withInput();
        }


        if(!ConnectionAvailability::serverConnectionAvailability($request->server_host, $request->server_port)) {
            session()->flash('error', 'Cannot read any server connection , please make sure that your server connection is correct');
            return redirect()->route('projects.index')->withInput();
        }


        $user_id = auth()->user()->id;
        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        UserProject::create($validated);

        return redirect()->route('panel.panel-home');
    }




}
