<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';

    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'SendAnswer',
        'PreventAfterLimit',
        'WinLimit',
        'InCorrentLimit',
        'PreventPlayerJoinInSameIPOrHwid',
        'Delay1',
        'Delay2'
    ];

/*    //protected $hidden
    protected $hidden = [
        'StallItemCodeName',
        'UniqueID',
        'MaxPlayers',
        'MinPlayers',
        'LotteryAmount',
        'InTown',
        'CapeType',
        'CapeDetection',
        'TargetNumber',
        'StallItemID',
        'ReqLevel',
        'RegKey',
        'LMSPlayMethod'
    ];*/
}
