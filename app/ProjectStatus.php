<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_status';
    protected  $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function userProjects()
    {
        return $this->belongsTo(UserProject::class);
    }
}
