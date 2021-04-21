<?php
/**
 * User: Abdelaziz
 * Date: 4/14/2021
 * Time: 2:08 AM
 */

namespace App\Http\ViewComposers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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


        $data = UserProject::where('user_id', auth()->user()->id)
            ->whereBetween('end_license', [Carbon::now(), Carbon::now()->addDays(7)])
            ->first();

        if($data) {
            $remLic = Carbon::parse($data->end_license)->diffInDays(Carbon::now()->format('y-m-d'));

        }



        $view->with('remLic', $remLic ?? null);


    }
}
