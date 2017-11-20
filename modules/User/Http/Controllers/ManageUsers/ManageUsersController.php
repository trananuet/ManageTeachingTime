<?php

namespace Modules\User\Http\Controllers\ManageUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ManageUsersController extends Controller
{
    /**
     * get all users
     * @return view
     */
    public function getAllUser()
    {
        return view('user::manage_users.manageUsers');
    }
}
