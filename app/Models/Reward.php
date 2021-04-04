<?php

namespace App\Models;

use App\Services\RewardService;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_Rewards';
    protected $primaryKey = 'EventKey';

    //protected $visible
    protected $fillable = [

        'EventKey',
        'RewardType',
        'RewardControl',
        'SilkType',
        'SilkAmount',
        'GoldAmount',
        'ItemCodeName128',
        'ItemPlus',
        'ItemAmount',

    ];

    public function scopeSearchByEventKey($query , $eventKey)
    {
        return $query->when($eventKey , function ($q) use ($eventKey) {

            return $q->where('EventKey' , $eventKey);

        });


    }


}


