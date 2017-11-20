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
            
            DB::commit();
			return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }
}