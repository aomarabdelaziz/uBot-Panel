<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyUser;

class NotificaionCenterController extends Controller
{
    public function index(Request $request)
    {

        $user = User::find($request->user_id);
        Notification::send($user , new NotifyUser($request->notify_type , $request->notify_content));
        return response(

            ['data' => 'done']
        );
    }

    public function markAsRead(Request $request)
    {
        if($request->ajax()) {

            auth()->user()->unreadNotifications->markAsRead();

        }
    }
}
