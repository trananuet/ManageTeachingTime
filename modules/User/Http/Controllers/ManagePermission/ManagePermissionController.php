<?php

namespace Modules\User\Http\Controllers\ManagePermission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\User\Repositories\RoleFunctionRepository;
// use Modules\User\Repositories\FunctionRepository;
use Modules\User\Entities\Role;


class ManagePermissionController extends Controller
{
    /**
    * get all functions
    * @return view
    */
    public function permission()
    {
        $role_functions = RoleFunctionRepository::get_all_role_function();
        // $functions = FunctionRepository::get_all_functions();

        return view('user::manage_permission.managePermission',compact('role_functions'));
    }

}