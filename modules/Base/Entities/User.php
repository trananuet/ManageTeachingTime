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
     * @param ROLE_ADMIN == 1 <helpers/DefineHelper.php>
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

    /**
    * quan ly he dao tao
    * @author AnTV
    * @param TRAINING = Quản lý hệ đào tạo <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public static function checkManageTraining(){
        $check = check_role(TRAINING);
        return $check;
        
    }

    /**
    * quan ly năm học
    * @author AnTV
    * @param SCHOOL_YEAR = Quản lý năm học <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public static function checkManageSchoolYear(){
        $check = check_role(SCHOOL_YEAR);
        return $check;
    }

    /**
    * quan ly hoc ky
    * @author AnTV
    * @param SEMESTER = Quản lý học kỳ <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageSemester(){
        $check = check_role(SEMESTER);
        return $check;
    }

    /**
    * quan ly chuc danh
    * @author AnTV
    * @param TITLE = Quản lý chức danh <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageTitle(){
        $check = check_role(TITLE);
        return $check;
    }
    /**
    * quan ly khoa, phong ban
    * @author AnTV
    * @param FACULTY = Quản lý khoa, phòng ban <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageFaculty(){
        $check = check_role(FACULTY);
        return $check;
    }
    /**
    * quan ly giang vien
    * @author AnTV
    * @param TEACHER = Quản lý giang vien <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageTeacher(){
        $check = check_role(TEACHER);
        return $check;
    }
    /**
    * quan ly mon hoc
    * @author AnTV
    * @param TITLE = Quản lý môn học <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageCourse(){
        $check = check_role(COURSE);
        return $check;
    }
}
