<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_Events';

    protected $fillable =
        [
            'id',
            'EventName',
            'Running',
            'Active'
        ];


}
