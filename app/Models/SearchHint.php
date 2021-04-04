<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHint extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_SearchHints';
    protected $primaryKey = 'id';


    //protected $visible
    protected $guarded = [];

    public function warps()
    {
        return $this->belongsTo(SearchWarp::class , 'id');
    }

    public function scopeSearchByEventKey($query , $request , $EVENTS)
    {

        return $query->when($request->event_name , function ($q) use ($request , $EVENTS) {

            return $q->where('EventKey' , $request->event_name);

        })->when($request->warp_key , function ($q) use ($request) {

            return $q->where('WarpKey' , $request->warp_key);


        });

    }
}
