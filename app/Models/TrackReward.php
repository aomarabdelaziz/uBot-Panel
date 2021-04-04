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

    public function scopeSearchByEventKey($query , $request)
    {

        return $query->when($request->event_name, function ($q) use ($request) {

            return $q->where('Event', $request->event_name);

        })->when($request->char_name , function ($q) use ($request) {

            return $q->where('Charname' , $request->char_name);

        })->paginate(50);

    }


}
