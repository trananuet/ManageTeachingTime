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
        $funcs = FunctionRepository::get_all_functions();
        $roles = RoleRepository::get_all_roles();

        return view('user::manage_system.manageSystem',compact('roles', 'funcs'));
    }

    public function saveRoleFunctions(Request $request)
    {
        $role = Role::findOrFail($request->id_role);
        $role_function_select = $request->id_function;
        $role_function_find = $role->functions()->get();
        dd($role_function_find);
        return redirect()->back();
    }

}
