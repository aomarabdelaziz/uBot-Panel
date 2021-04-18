<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class PVP extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    //protected $visible
    protected $fillable = [
        'EventKey',
        'RegKey',
        'MinPlayers',
        'MaxPlayers',
        'ReqLevel',
        'BattleDelay',
        'PreventPlayerJoinInSameIPOrHwid',
        'Delay1',
        'Delay2'
    ];

    public function setMinPlayersAttribute($value)
    {

        $this->attributes['MinPlayers'] = $value >= 2 ? $value : 2 ;
    }
}
