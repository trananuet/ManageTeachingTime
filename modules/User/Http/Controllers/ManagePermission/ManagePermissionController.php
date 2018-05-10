<?php

namespace Modules\User\Http\Controllers\ManagePermission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Repositories\RoleFunctionRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\FunctionRepository;
use Modules\User\Entities\Role;


class ManagePermissionController extends Controller
{
    /**
    * get all functions
    * @return view
    */
    public function getPermission()
    {
        $roles = RoleRepository::get_all_roles_not_admin();
        $role_functions = RoleFunctionRepository::get_all_role_function();
        $functions = FunctionRepository::get_all_functions();
        // $functions = FunctionRepository::get_all_functions();

        return view('user::manage_permission.managePermission',compact('role_functions','roles','functions'));
    }

    /**
    * create and edit
    * @param $request
    * @return void
    */
    public function savePermission(Request $request)
    {
        $role_functions = RoleFunctionRepository::save_role_function($request);
        if($role_functions == true) {
            return back()->with('success','Đã cập nhật dữ liệu!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
        // return redirect()->back();
    }
    /**
    * remove with check all role functions
    * @author AnTV
    * @param $request
    * @return view
    */
    public function removePermission(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn chức năng nào.!!!'
        ]);
        $role_function = RoleFunctionRepository::remove_role_function($request);
        if($role_function == true) {
            return redirect()->back()->with('success','Xóa dữ liệu thành công!');
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }

}