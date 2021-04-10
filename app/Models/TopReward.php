<?php

namespace App\Models;

use App\Services\RewardService;
use Illuminate\Database\Eloquent\Model;

class TopReward extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_TopWinnersRewards';

    //protected $visible
    protected $fillable = [

        'id',
        'TopWinner',
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

    public function getRewardTypeAttribute($value)
    {

       return RewardService::getRewardType($value);

    }
    public function getRewardControlAttribute($value)
    {

        return RewardService::getRewardControl($value);

    }
    public function getSilkTypeAttribute($value)
    {

        return RewardService::getSilkType($value);

    }



}
