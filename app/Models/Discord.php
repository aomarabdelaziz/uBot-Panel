<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discord extends Model
{

    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_Discord';
    protected $primaryKey = 'Type';

    protected $guarded = [];


    public function setBotNameAttribute($value)
    {
        $this->attributes['BotName'] = is_null($value) ? 'uBot' : $value;
    }

}
