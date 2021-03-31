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
}
