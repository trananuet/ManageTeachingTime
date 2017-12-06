<?php 
namespace Modules\User\Repositories;

use Modules\User\Entities\Role;
use Illuminate\Http\Request;
use Modules\User\Entities\RoleFunction;
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

    /**
    * roles khong co admin
    * @author AnTV
    * @param ID_ADMIN = 0 ; su dung id admin trong database, define trong helpers/DefineHelper.php
    * @return static
    */
    public static function get_all_roles_not_admin()
    {
        $roles = Role::where('roles.id','<>',ID_ADMIN)->get();
        return $roles;
    }

    /**
    * save_role
    * @author AnTV
    * @param $request
    * @return static
    */
    public static function save_role(Request $request)
    {
        DB::beginTransaction();
 		try {
            if(isset($request->id)){
                $role = Role::findOrFail($request->id);
                $role->role = $request->role;
                $role->save();
                // $role_function_select = $request->id_function;
                // $role_function_find = $role->functions()->get();
                // if(count($role_function_find)>0){
                //     $role_function_find = add_functions($role_function_select, $role_function_find, $role);
                //     $role_function_find = remove_function($role_function_select, $role_function_find, $role);
                // } else {
                //     if(count($role_function_select)>0){
                //         foreach($role_function_select as $key => $value) {
                //             $role_funciton_new = new RoleFunction();
                //             $role_funciton_new->role_id = $role->id;
                //             $role_funciton_new->function_id = $value;
                //             $role_funciton_new->save();
                //         }
                //     }
                // }
            } else {
                $role = new Role();
                $role->role = $request->role;
                $role->save();
                // $role_function_select = $request->id_function;
                // if(count($role_function_select)>0){
                //     foreach($role_function_select as $key => $value) {
                //             $role_funciton_new = new RoleFunction();
                //             $role_funciton_new->role_id = $role->id;
                //             $role_funciton_new->function_id = $value;
                //             $role_funciton_new->save();
                //     }
                // }
            }
                DB::commit();
                return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }
    /**
    * xoa quyen 
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return boolean
    */
	public static function remove_access(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$role = Role::find($id);
				if(!$role) {
					return false;
				}
                // $role_function = RoleFunction::where('role_id',$id)->get();
                // foreach($role_function as $value){
				// 	$value->delete();
				// }
				$role->delete();
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