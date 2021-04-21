<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Void_;

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

    public function setWinLimitAttribute($value)
    {

        if($this->PreventAfterLimit)
        {
             $this->attributes['WinLimit'] = $value == 0 ? 1 : $value;

        }
    }


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
