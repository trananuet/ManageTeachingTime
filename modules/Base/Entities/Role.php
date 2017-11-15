<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Entities\User;

class Role extends Model
{
    protected $table = 'roles';
    public function users()
    {
        return $this->belongsToMany('Modules\Base\Entities\User', 'user_roles');
    }
}