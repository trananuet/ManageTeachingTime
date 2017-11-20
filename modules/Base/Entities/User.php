<?php

namespace Modules\Base\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Entities\Role;
use Modules\User\Entities\UserRole;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function roles()
    {
        return $this->belongsToMany('Modules\Base\Entities\Role', 'user_roles');
    }


     /**
     * Check current user has moderator role
     * @author AnTV
     * @param ROLE_ADMIN <helpers/DefineHelper.php>
     * @return boolean
     */
    public function checkMod(){
        $listRole = UserRole::where('user_id', $this->id)
                            ->get();
        $check = false;
        for ($i=0; $i < count($listRole) ; $i++) { 
            if($listRole[$i]->role_id <= ROLE_ADMIN){
                $check = true;
                break;
            }
        }
        return $check;
    }
}
