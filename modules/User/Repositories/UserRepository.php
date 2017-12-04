<?php 
namespace Modules\User\Repositories;

use Modules\Base\Entities\User;
use Modules\User\Entities\UserRole;
use Modules\User\Entities\Role;
use Illuminate\Http\Request;
use DB;

class UserRepository 
{
    /**
    * User
    * @author AnTV
    * @return static
    */
    public static function get_all_users()
    {
        $user = User::selectRaw("users.*,roles.role as role")
                    ->leftjoin('user_roles','user_roles.user_id','=','users.id')
                    ->leftjoin('roles','roles.id','=','user_roles.role_id')
                    ->get();
        return $user;
    }

    /**
    * save user
    * @author AnTV
    * @param $request
    * @return static
    */
    public static function save_user(Request $request)
    {
        DB::beginTransaction();
 		try {
            if(isset($request->id)){
                $user = User::findOrFail($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                //$user->password = bcrypt($request->password);
                $user->save();
                $user_roles = UserRole::where('user_id',$request->id)->get();
                foreach($user_roles as $user_role){
                    $user_role->role_id = $request->role_id;
                    $user_role->save();
                }
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
                $user_role = new UserRole();
                $user_role->user_id = $user->id;
                $user_role->role_id = $request->role_id;
                $user_role->save();
            }
                DB::commit();
                return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }


    /**
    * xoa nguoi dung 
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return boolean
    */
	public static function remove_user(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$user = User::find($id);
				if(!$user) {
					return false;
				}
                // $role_function = RoleFunction::where('role_id',$id)->get();
                // foreach($role_function as $value){
				// 	$value->delete();
				// }
				$user->delete();
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