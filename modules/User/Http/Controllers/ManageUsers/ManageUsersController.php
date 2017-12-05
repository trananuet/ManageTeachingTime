<?php

namespace Modules\User\Http\Controllers\ManageUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Base\Entities\User;
use Modules\User\Entities\Role;
use Modules\User\Entities\UserRole;
use Modules\User\Repositories\UserRepository;
use Modules\User\Repositories\RoleRepository;
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
        $roles = RoleRepository::get_all_roles();
		$users = UserRepository::get_all_users();
        // dd($users);
        return view('user::manage_users.manageUsers',compact('users','roles'));
    }


    /**
    * create and edit
    * @param $request
    * @return void
    */
    public function saveUser(Request $request)
    {

        $user = UserRepository::save_user($request);
        if($user == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
        return redirect()->back();
    }

    
    /**
    * remove with check all users
    * @author AnTV
    * @param $request
    * @return view
    */
    public function removeUser(Request $request){
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn người dùng nào.!!!'
        ]);
        $user = UserRepository::remove_user($request);
        if($user == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
