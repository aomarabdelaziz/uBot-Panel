<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $fillable =
        [
            'project_name',
            'status'
        ];
}
