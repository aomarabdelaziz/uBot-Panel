<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\ProjectStatus;
use App\Services\ConnectionAvailabilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{

    public function startBot(Request $request)
    {
        if($request->ajax()) {

            if(!ConnectionAvailabilityService::checkUserServerConnectionAvailability()) {
                return response([
                    "error" => 'Cannot read any server connection , please make sure that your connection is available'
                ]);
            }

           if(!Gate::allows('access-event')) {
                return response([
                    "error" => 'You have to renew your membership to do this action'
                ]);
            }

            if (!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {

                return response([
                        "error" => 'Cannot read any sql connection , please make sure that your connection is correct'
                    ]);
            }
            $user_Project = auth()->user()->projects->project_name;
            $status = ProjectStatus::where('project_name' , $user_Project)->first();

            if($status->status !== "offline") {

                return response([
                    "error" => 'Bot aleardy active'
                ]);
            }

            Order::updateOrCreate([

                'project_name' => $user_Project,
                'order_key' => 'Launch',
                'services' => '0'
            ]);

            return response([
                "success" => 'Bot is being to be start'
            ]);

        }



    }

    public function restartBot(Request $request)
    {

        if($request->ajax()) {

            if(!Gate::allows('access-event')) {
                return response([
                    "error" => 'You have to renew your membership to do this action'
                ]);
            }
            if (!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {

                return response([
                    "error" => 'Cannot read any sql connection , please make sure that your connection is correct'
                ]);
            }

            $user_Project = auth()->user()->projects->project_name;
            $status = ProjectStatus::where('project_name' , $user_Project)->first();
            if($status->status !== "online") {

                return response([
                    "error" => 'Bot aleardy in-active, cannot restart in active bot'
                ]);
            }


            Order::updateOrCreate([

                'project_name' => $user_Project,
                'order_key' => 'Restart',
                'services' => '0'
            ]);

            return response([
                "success" => 'Bot is being to be restart'
            ]);
        }

    }

    public function closeBot(Request $request)
    {


        if($request->ajax()) {

            if(!Gate::allows('access-event')) {
                return response([
                    "error" => 'You have to renew your membership to do this action'
                ]);
            }

            if (!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {

                return response([
                    "error" => 'Cannot read any sql connection , please make sure that your connection is correct'
                ]);
            }

            $user_Project = auth()->user()->projects->project_name;
            $status = ProjectStatus::where('project_name' , $user_Project)->first();
            if($status->status !== "online") {


                return response([
                    "error" => 'Bot aleardy in-active'
                ]);
            }

            Order::updateOrCreate([

                'project_name' => $user_Project,
                'order_key' => 'Shutdown',
                'services' => '0'
            ]);

            return response([
                "success" => 'Bot is being to be close'
            ]);
        }

    }
    public function forceCloseBot(Request $request)
    {


        if($request->ajax()) {

            if(!Gate::allows('access-event')) {
                return response([
                    "error" => 'You have to renew your membership to do this action'
                ]);
            }

            if (!ConnectionAvailabilityService::checkUserSqlConnectionAvailability()) {

                return response([
                    "error" => 'Cannot read any sql connection , please make sure that your connection is correct'
                ]);
            }

            $user_Project = auth()->user()->projects->project_name;
            $status = ProjectStatus::where('project_name' , $user_Project)->first();
            $status->update([
                'status' => 'offline'
            ]);

            Order::updateOrCreate([

                'project_name' => $user_Project,
                'order_key' => 'Shutdown',
                'services' => '0'
            ]);

            return response([
                "success" => 'Bot is being to be close'
            ]);
        }

    }
}
