<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class UniqueSettings extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_UniquesSettings';



    //protected $visible
    protected $fillable = [

        'Priority',
        'RegKey',
        'UniqueID',
        'UniqueCount',
        'UniqueDelay',
        'Points',

    ];

    public function scopeSearchByRequestKey($query , $request)
    {

        return $query->when($request->priority , function ($q) use ($request) {

            return $q->where('Priority' ,  $request->priority);

        })->when($request->unique_id , function ($q) use ($request) {

            return $q->where('UniqueID' ,  $request->unique_id);


        });

    }
}
