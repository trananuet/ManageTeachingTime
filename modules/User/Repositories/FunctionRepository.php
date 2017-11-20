<?php 
namespace Modules\User\Repositories;

use Modules\User\Entities\Functions;
use Illuminate\Http\Request;
use DB;

class FunctionRepository
{
    /**
    * roles
    * @author AnTV
    * @return static
    */
    public static function get_all_functions()
    {
        $func = Functions::all();
        return $func;
    }
}