<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscordSchedule extends Model
{
    public $timestamps = false;
    protected $connection = 'sqlsrv_user';
    protected $table = '_DiscordSchedule';

    protected $guarded = [];
}
