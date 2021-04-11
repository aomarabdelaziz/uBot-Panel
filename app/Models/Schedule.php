<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_EventsSchedule';

    //protected $visible
    protected $guarded = [];

    public function scopeSearchByEventKey($query , $eventKey)
    {
        return $query->when($eventKey && $eventKey != 'All' , function ($q) use ($eventKey) {

            return $q->where('EventName' , $eventKey);

        })->when($eventKey === 'All' , function ($q)  {

            return $q;
        });


    }
}
