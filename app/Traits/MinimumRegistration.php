<?php
/*
    * User: Abdelaziz
    * Date: 4/5/2021
    * Time: 6:50 AM
*/

namespace App\Traits;

trait MinimumRegistration
{
    public function setMinPlayersAttribute($value)
    {

        $this->attributes['MinPlayers'] = $value >= 2 ? $value : 2 ;
    }
}
