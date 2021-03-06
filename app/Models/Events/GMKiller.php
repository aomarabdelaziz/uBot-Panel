<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class GMKiller extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_MainSettings';
    protected $primaryKey = 'EventKey';

    //protected $visible
    protected $fillable = [
        'EventKey',
        'MaxRounds',
        'Delay1',
        'Delay2'
    ];
}
