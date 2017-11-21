<?php

namespace Modules\User\Http\Controllers\ManageUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Base\Entities\Users;
use Modules\User\Entities\User_Roles;
use Modules\User\Entities\Roles;
use Modules\User\Repositories\UserRepository;
use DB;


class ManageUsersController extends Controller
{
    /**
     * get all users
     * @return view
     */
    public function getUser()
    {
    	$users = DB::table('Users')->get();
    	$cust=DB::table('User_Roles')
           ->join('Users', 'User_Roles.user_id', '=', 'Users.id')
           ->join('Roles', 'User_Roles.role_id', '=', 'Roles.id')
           ->select('Users.name','Users.email', 'Roles.role','Users.id')
            ->get();
        return view('user::manage_users.manageUsers',compact('users','cust'));
    }
}
