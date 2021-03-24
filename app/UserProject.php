<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable =
        [
            'user_id' , 'project_name' , 'sql_host' , 'sql_username' , 'sql_password' , 'db_account' ,
            'db_shard' , 'db_shardlog' , 'server_host' , 'server_port' , 'server_accountid' , 'server_accountpw' ,
            'server_charname' , 'server_captcha'
        ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function setServerCaptchaAttribute($value)
    {
        $this->attributes['server_captcha'] = $value ==  '' ? ';' : $value;
    }
    public function setServerCharnameAttribute($value)
    {
        $this->attributes['server_charname'] = $value != "AutoEvent" ? 'AutoEvent' : $value;

    }
    public function setServerAccountIDAttribute($value)
    {
        $this->attributes['server_accountid'] = strtolower($value);

    }

    public function scopeUserHasProject($query)
    {
        return $query->where('user_id' , auth()->user()->id)->count() > 0;
    }

}
