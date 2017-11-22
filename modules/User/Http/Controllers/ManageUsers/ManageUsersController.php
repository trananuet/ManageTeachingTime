<?php

namespace Modules\User\Http\Controllers\ManageUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Base\Entities\Users;
use Modules\User\Entities\User_Roles;
use Modules\User\Entities\Roles;
use Modules\User\Repositories\UserRepository;
use Modules\User\Repositories\FunctionRepository;
use DB;


class ManageUsersController extends Controller
{
    /**
     * get all users
     * @return view
     */
    public function getUser()
    {
		$funcs = FunctionRepository::get_all_functions();
    	$users=DB::table('User_Roles')
           ->join('Users', 'User_Roles.user_id', '=', 'Users.id')
           ->join('Roles', 'User_Roles.role_id', '=', 'Roles.id')
           ->select('Users.name','Users.email', 'Roles.role','Users.id','Roles.id as roleid')
            ->get();
        return view('user::manage_users.manageUsers',compact('users','funcs'));
    }
    public function saveUserFunctions(Request $request)
    {
        $user_function = RoleRepository::save_user_function($request);
        if($user_function == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
        return redirect()->back();
    }

}
