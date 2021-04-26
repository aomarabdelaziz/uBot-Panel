<?php
/**
 * User: Abdelaziz
 * Date: 4/14/2021
 * Time: 3:36 AM
 */

namespace App\Services;

use App\Jobs\UserMail;
use App\Notifications\UserNotifications;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Services
 */
class LicenseNotifyService
{
    private object $users;

    /**
     * LicenseNotifyService constructor.
     * @param object $users
     */
    public function __construct(object $users)
    {
        $this->users = $users;
    }


    public function handle()
    {
        foreach ($this->users as $user) {


            if($user->projects)
            {

                $days =  Carbon::parse($user->projects->end_license)->diffInDays( Carbon::now()->format('y-m-d'));
                $date =  Carbon::now()->format('y-m-d') >= Carbon::parse($user->projects->end_license)->format('y-m-d');;

                if ($date) {


                    dispatch(new UserMail($user->email , "Your membership has been ended"));
                    Notification::send($user, new UserNotifications('success', "Your membership has been ended"));

                    $user->update(
                        [
                            'role' => 'user'
                        ]);

                    $user->projects->order()->updateOrCreate(
                        [

                            'project_name' => $user->projects->project_name,
                            'order_key' => 'Shutdown',
                            'services' => '0'

                        ]);

                }
                else
                    {

                        Notification::send($user, new UserNotifications('success', "Your membership will end in {$days} day(s)"));
                        dispatch(new UserMail($user->email , "Your membership will end in {$days} day(s)"));

                    }

            }



        }
    }

}
