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
    * @return static
    */
    public static function get_all_role_function()
    {
        // $role_function = RoleFunction::all();
        $role_function = Role::selectRaw("roles.*,functions.name_function as function")
                    ->leftjoin('role_functions','role_functions.role_id','=','roles.id')
                    ->leftjoin('functions','role_functions.function_id','=','functions.id')
                    ->whereNotNull('functions.name_function')
                    ->orderBy('id','asc')
                    ->get();
        return $role_function;
    }
}