<?php
/**
 * User: Abdelaziz
 * Date: 4/14/2021
 * Time: 3:36 AM
 */

namespace App\Services;

use App\Notifications\NotifyUser;
use App\Order;
use App\User;
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


            if(!is_null($user->projects))
            {
                Notification::send($user , new NotifyUser('success' , 'your membership will end'));


                $date = date('y-m-d') >= date( 'y-m-d' , strtotime($user->projects->end_license))   ;


                if($date)
                {

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
            }

        }
    }

}
