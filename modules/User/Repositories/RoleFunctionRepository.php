<?php 
namespace Modules\User\Repositories;

use Modules\User\Entities\RoleFunction;
use Modules\User\Entities\Role;
use Illuminate\Http\Request;
use DB;

class RoleFunctionRepository
{
    /**
    * roles
    * @author AnTV
    * @param ID_ADMIN = 0 ; su dung id admin trong database, define trong helpers/DefineHelper.php
    * @return static
    */
    public static function get_all_role_function()
    {
        // $role_function = RoleFunction::all();
        $role_function = Role::selectRaw("roles.*,functions.name_function as function,role_functions.id as rol_fuct_id")
                    ->leftjoin('role_functions','role_functions.role_id','=','roles.id')
                    ->leftjoin('functions','role_functions.function_id','=','functions.id')
                    ->whereNotNull('functions.name_function')
                    ->where('roles.id','<>',ID_ADMIN)
                    ->orderBy('id','asc')
                    ->get();
        return $role_function;
    }

    /**
    * save_function
    * @author AnTV
    * @param $request
    * @return static
    */
    public static function save_role_function(Request $request)
    {
        DB::beginTransaction();
 		try {
            if(isset($request->id)){
                $role_funciton = RoleFunction::findOrFail($request->id);
                $role_funciton->role_id = $request->role_id;
                $role_funciton->function_id = $request->function_id;
                $role_funciton->save();
            } else {
                // $role_function = new RoleFunction();
                $role_function_select = $request->function_id;
                if(count($role_function_select)>0){
                    foreach($role_function_select as $key => $value) {
                            $role_funciton = new RoleFunction();
                            $role_funciton->role_id = $request->role_id;
                            $role_funciton->function_id = $value;
                            $role_funciton->save();
                    }
                }
                // $role_function->save();
            }
                DB::commit();
                return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }


    /**
    * xoa cac role function
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return boolean
    */
	public static function remove_role_function(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$role_funcitons = RoleFunction::find($id);
				if(!$role_funcitons) {
					return false;
				}
				$role_funcitons->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
	}

}