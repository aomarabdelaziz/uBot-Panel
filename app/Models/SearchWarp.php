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

    protected static function boot()
    {
        parent::boot();
        self::observe(WarpHintObserver::class);
    }


}
