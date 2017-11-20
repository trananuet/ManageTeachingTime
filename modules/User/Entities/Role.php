<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Entities\User;

class Role extends Model
{
    protected $table = 'roles';


    public function users()
    {
        return $this->belongsToMany('Modules\Base\Entities\User', 'user_roles');
    }


    public function functions()
    {
        return $this->belongsToMany('Modules\User\Entities\Functions', 'role_functions','role_id','function_id');
    }
}