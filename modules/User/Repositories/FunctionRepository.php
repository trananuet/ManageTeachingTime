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


    /**
    * save_function
    * @author AnTV
    * @param $request
    * @return static
    */
    public static function save_functions(Request $request)
    {
        DB::beginTransaction();
 		try {
            if(isset($request->id)){
                $functions = Functions::findOrFail($request->id);
                $functions->name_function = $request->functions;
                $functions->save();
            } else {
                $functions = new Functions();
                $functions->name_function = $request->functions;
                $functions->save();
            }
                DB::commit();
                return true;
        } catch(\Exception $ex){
            DB::rollback();
			return false;
        }
    }

    
    /**
    * xoa cac quyen chuc nang
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return boolean
    */
	public static function remove_functions(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$functions = Functions::find($id);
				if(!$functions) {
					return false;
				}
				$functions->delete();
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