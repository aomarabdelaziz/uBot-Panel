<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warp extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_Warps';
    protected $primaryKey = 'EventKey';

    //protected $visible
    protected $fillable = [

        'EventKey',
        'RegionID',
        'PosX',
        'PosY',
        'PosZ',
        'WorldID',

    ];

    public function scopeSearchByEventKey($query , $eventKey)
    {

        return $query->when($eventKey , function ($q) use ($eventKey) {

            return $q->where('EventKey' , $eventKey);

        })->first();

    }
}
