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
     * Check giang vien
     * @author AnTV
     * @param ID_TEACHER == 3 <helpers/DefineHelper.php>
     * @return boolean
     */
    public function checkTeacher(){
        $listRole = UserRole::where('user_id', $this->id)
                            ->get();
        $check = false;
        for ($i=0; $i < count($listRole) ; $i++) { 
            if($listRole[$i]->role_id == ID_TEACHER){
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

    /**
    * quan ly khoa luan
    * @author AnTV
    * @param THESIS = Quản lý khoa luan <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageThesis(){
        $check = check_role(THESIS);
        return $check;
    }

    /**
    * quan ly dinh muc chi tra
    * @author AnTV
    * @param SALARY = Quản lý định mức chi trả <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageSalary(){
        $check = check_role(SALARY);
        return $check;
    }

    /**
    * quan ly he thong - vai tro
    * @author AnTV
    * @param ACCESS = Quản lý hệ thống vai trò <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageAccess(){
        $check = check_role(ACCESS);
        return $check;
    }

    /**
    * quan ly he thong - nguoi dung
    * @author AnTV
    * @param USER = Quản lý hệ thống người dùng <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageUser(){
        $check = check_role(USER);
        return $check;
    }

    /**
    * quan ly he thong - chuc nang
    * @author AnTV
    * @param FUNCTIONS = Quản lý hệ thống chức năng <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageFunctions(){
        $check = check_role(FUNCTIONS);
        return $check;
    }
    
    /**
    * quan ly he thong - phan quyen
    * @author AnTV
    * @param PERMISSION = Quản lý hệ thống phân quyền <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManagePermission(){
        $check = check_role(PERMISSION);
        return $check;
    }

        /**
    * quan ly he thong - nhat ky
    * @author AnTV
    * @param HISTORY = Quản lý hệ thống nhật ký <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageHistory(){
        $check = check_role(HISTORY);
        return $check;
    }


    /**
    * quan ly nhap du lieu huong dan
    * @author AnTV
    * @param DATA_GUIDE = Quản lý nhập dữ liệu giảng dạy <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkDataGuide(){
        $check = check_role(DATA_GUIDE);
        return $check;
    }


    /**
    * quan ly nhap du lieu giang day
    * @author AnTV
    * @param DATA_TEACH = Quản lý nhập dữ liệu giảng dạy <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkDataTeach(){
        $check = check_role(DATA_TEACH);
        return $check;
    }

    /**
    * quan ly thong ke so lieu huong dan cua giang vien
    * @author AnTV
    * @param STATISTIC_GUIDE = Quản lý thống kê số liệu hướng dẫn của giảng viên <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageStatisticGuide(){
        $check = check_role(STATISTIC_GUIDE);
        return $check;
    }

    /**
    * quan ly thong ke gio giang cua giang vien
    * @author AnTV
    * @param STATISTIC_TEACH = Quản lý thống kê giờ giảng của giảng viên <helpers/DefineHelper.php>
    * @param ham check_role <helpers/CustomHelper.php>
    * @return boolean
    */
    public function checkManageStatisticTeach(){
        $check = check_role(STATISTIC_TEACH);
        return $check;
    }
}
