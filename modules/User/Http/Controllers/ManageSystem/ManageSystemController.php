<?php

namespace Modules\User\Http\Controllers\ManageSystem;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\FunctionRepository;
use Modules\User\Entities\Role;


class ManageSystemController extends Controller
{
    /**
    * get all roles and functions
    * @return view
    */
    public function getAllRole()
    {
        //$funcs = FunctionRepository::get_all_functions();
        $roles = RoleRepository::get_all_roles();

        return view('user::manage_system.manageSystem',compact('roles'));
    }


    /**
    * create and edit
    * @param $request
    * @return void
    */
    public function saveRoleFunctions(Request $request)
    {
        $role_function = RoleRepository::save_role_function($request);
        if($role_function == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
        return redirect()->back();
    }

    /**
    * remove with check all school-years
    * @author AnTV
    * @param $request
    * @return view
    */
    public function removeRoleAccess(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn quyền nào.!!!'
        ]);
        $role = RoleRepository::removeAccess($request);
        if($role == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
