<?php

namespace Modules\User\Http\Controllers\ManageUsers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        return view('user::manage_users.manageUsers');
    }
}
