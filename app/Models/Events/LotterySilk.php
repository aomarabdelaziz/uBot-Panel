<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class LotterySilk extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'RegKey',
        'MinPlayers',
        'MaxPlayers',
        'LotteryAmount',
        'PreventPlayerJoinInSameIPOrHwid',
        'Delay1',
        'Delay2'
    ];
}
