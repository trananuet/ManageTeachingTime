<?php 
namespace Modules\User\Repositories;

use Modules\User\Entities\Role;
use Illuminate\Http\Request;
use DB;

class RoleRepository
{
    /**
    * roles
    * @author AnTV
    * @return static
    */
    public static function get_all_roles()
    {
        $roles = Role::all();
        return $roles;
    }
    public static function save_role_function(Request $request)
    {
        DB::beginTransaction();
		try {
            $role = Role::findOrFail($request->id_role);
            $role_function_select = $request->id_function;
            $role_function_find = $role->functions()->get();
            $role_function_find = add_functions($role_function_select, $role_function_find, $role);
            $role_function_find = remove_function($role_function_select, $role_function_find, $role);
            DB::commit();
			return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }
}