<?php
/**
 * User: Abdelaziz
 * Date: 3/27/2021
 * Time: 9:00 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

/**
 * @Author Abdelaziz Omar <Abdelazizomar851@gmail.com>
 * @package App\Http\ViewComposers
 */
class ProjectNameComposer
{
    public function compose(View $view)
    {

        $view->with('userName' , auth()->user()->projects->project_name);


    }
}
