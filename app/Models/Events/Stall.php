<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'StallItemID',
        'Delay1',
        'Delay2'
    ];

    //protected $hidden
/*    protected $hidden = [
        'RegKey',
        'MinPlayers',
        'MaxPlayers',
        'SendAnswer',
        'CapeType',
        'WinLimit',
        'InCorrentLimit',
        'WinLimit',
        'UniqueID',
        'PreventAfterLimit',
        'PreventPlayerJoinInSameIPOrHwid',
        'TargetNumber',
        'CapeDetection',
        'CapeType',
        'CapeDetection',
        'InTown',
        'LotteryAmount',
        'MinPlayers',
        'MaxPlayers',
        'StallItemID',
        'ReqLevel',
        'RegKey',
        'LMSPlayMethod'
    ];*/
}
