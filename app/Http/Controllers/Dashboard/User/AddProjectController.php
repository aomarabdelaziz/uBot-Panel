<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddProjectRequest;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        return view('dashboard.user.project.create');
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
            return  'ffff';
        }
        $user_id = auth()->user()->id;
        $validated = $request->validated();
        $validated['user_id'] = $user_id;
        UserProject::create($validated);

        return redirect()->route('dashboard.dashboard-home');
    }




}
