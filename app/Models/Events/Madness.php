<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Madness extends Model
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
        'ReqLevel',
        'UniqueID',
        'PreventPlayerJoinInSameIPOrHwid',
        'Delay1',
        'Delay2'
    ];
}
