<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class LuckyStore extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'PreventAfterLimit',
        'WinLimit',
        'PreventPlayerJoinInSameIPOrHwid',
        'Delay1',
        'Delay2'
    ];

    //protected $hidden
    protected $hidden = [
        'SendAnswer',
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
        'RegKey'
    ];
}
