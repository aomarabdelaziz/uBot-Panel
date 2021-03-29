<?php
/**
 * User: Abdelaziz
 * Date: 3/27/2021
 * Time: 9:43 PM
 */

namespace App\Http\ViewComposers;


use App\Services\ConnectionAvailabilityService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Http\ViewComposers
 */
class SqlConnectionAvailabilityComposer
{
    public function compose(View $view)
    {
        if(Auth::check()) {

            $error_msg = !ConnectionAvailabilityService::checkUserSqlConnectionAvailability()
                ? "Cannot read any sql connection , please make sure that your connection is correct"
                : "";

        }

        $view->with('notify_sqlError' , $error_msg ?? '');
    }
}
