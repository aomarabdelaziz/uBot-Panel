<?php

namespace App\Models;

use App\Observers\WarpHintObserver;
use Illuminate\Database\Eloquent\Model;

class SearchWarp extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_SearchWarps';
    protected $primaryKey = 'id';

    //protected $visible
    protected $guarded = [];

    public function hints()
    {
        return $this->hasMany(SearchHint::class, 'id');
    }

    public function scopeSearchByEventKey($query , $request , $EVENTS)
    {

        return $query->when($request->event_name , function ($q) use ($request , $EVENTS) {

            return $q->where('EventKey' ,  $request->event_name);

        })->when($request->warp_key , function ($q) use ($request) {

            return $q->where('WarpKey' ,  $request->warp_key);


        });

    }



}
