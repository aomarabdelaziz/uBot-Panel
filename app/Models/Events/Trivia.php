<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';


    public $timestamps = false;

    //protected $visible
    protected $fillable = [
      'id' , 'EventKey', 'MaxRounds' , 'SendAnswer' , 'PreventAfterLimit' , 'WinLimit'
        , 'InCorrentLimit' , 'PreventPlayerJoinInSameIPOrHwid' , 'Delay1' , 'Delay2'
    ];

    protected $hidden = [
        'StallItemCodeName' , 'UniqueID' ,
        'MaxPlayers' ,'MinPlayers' ,
        'LotteryAmount' , 'InTown' , 'CapeType' , 'CapeDetection' , 'TargetNumber' , 'StallItemID' ,
        'ReqLevel' , 'RegKey'
    ];
}
