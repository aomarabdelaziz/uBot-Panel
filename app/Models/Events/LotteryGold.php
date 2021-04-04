<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class LotteryGold extends Model
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
        'WinLimit',
        'MinPlayers',
        'MaxPlayers',
        'InTown',
        'LotteryAmount',
        'Delay1',
        'Delay2'
    ];
}
