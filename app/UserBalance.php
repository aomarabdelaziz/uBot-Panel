<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    protected $table = 'user_balance';
    protected $guarded = [];
    protected $primaryKey = 'user_id';

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
