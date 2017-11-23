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

        $roles = DB::table('Roles')->get();

        return view('user::manage_users.manageUsers',compact('users','funcs','roles'));
    }

    /**
     * save role_user
     * @return view
     */
    public function saveRoleUser(Request $req, $userID)
    {
         DB::table('User_Roles')
            ->where('user_id',$userID)
            ->update([  
                        'role_id' => $req -> role
                ]);
        return redirect()->back()->with('thongbao','Chỉnh sửa thành công');
    }


    /**
     * add user
     * @return view
     */
    public function addUser(Request $req)
    {
        return redirect()->back();
    }
}
