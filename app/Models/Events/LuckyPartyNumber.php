<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class LuckyPartyNumber extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'TargetNumber',
        'Delay1',
        'Delay2'
    ];

    //protected $hidden
/*    protected $hidden = [
        'SendAnswer',
        'WinLimit',
        'PreventPlayerJoinInSameIPOrHwid',
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
