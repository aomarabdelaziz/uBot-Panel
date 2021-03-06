<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class LuckyCritical extends Model
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
        'CapeDetection',
        'PreventPlayerJoinInSameIPOrHwid',
        'CapeType',
        'Delay1',
        'Delay2'
    ];

    public function setMinPlayersAttribute($value)
    {

        $this->attributes['MinPlayers'] = $value >= 2 ? $value : 2 ;
    }
    //protected $hidden
/*    protected $hidden = [
        'MaxRounds',
        'SendAnswer',
        'WinLimit',
        'PreventAfterLimit',
        'InCorrentLimit',
        'TargetNumber',
        'CapeDetection',
        'CapeType',
        'InTown',
        'LotteryAmount',
        'MinPlayers',
        'MaxPlayers',
        'UniqueID',
        'StallItemID',
        'ReqLevel',
        'RegKey',
        'LMSPlayMethod'
    ];*/
}
