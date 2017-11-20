<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $fillable = [];
    protected $table = 'functions';

    public function roleFunctions()
    {
        return $this->belongsToMany('Modules\User\Entities\Role', 'role_functions','role_id','function_id');
    }
}
