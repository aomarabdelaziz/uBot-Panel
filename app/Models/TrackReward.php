<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackReward extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_ExecutedRewards';
    protected $primaryKey = 'Eventname';

    //make all fields are fillable
    protected $guarded = [];


}
