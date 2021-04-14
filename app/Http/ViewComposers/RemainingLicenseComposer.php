<?php
/**
 * User: Abdelaziz
 * Date: 4/14/2021
 * Time: 2:08 AM
 */

namespace App\Http\ViewComposers;

use Carbon\Carbon;
use Illuminate\View\View;
use App\UserProject;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Http\ViewComposers
 */
class RemainingLicenseComposer
{
    public function compose(View $view)
    {

       $remLic = null;
       $data = UserProject::where('user_id' , auth()->user()->id)
            ->whereBetween('end_license' , [Carbon::now() , Carbon::now()->addDays(7)])
            ->first();

       if($data) {

           $remLic = Carbon::parse($data->end_license)->diffForHumans(Carbon::now());
       }



        $view->with('remLic' , $remLic);


    }
}
