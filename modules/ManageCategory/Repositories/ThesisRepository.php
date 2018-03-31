<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Thesis;
use Illuminate\Http\Request;
use DB;

class ThesisRepository 
{

    public static function getAllThesis()
    {
       	$thesis = Thesis::all();
        return $thesis;
    }

    public static function saveThesis(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->id)){
                $thesis = Thesis::where('id', $request->id)->firstOrFail();
                $thesis->name = $request->name;
                $thesis->type = $request->type;
                $thesis->quota = $request->quota;
                $thesis->save();
                DB::commit();
                return true;
            } else {   
                $thesis = new Thesis();
                $thesis->name = $request->name;
                $thesis->type = $request->type;
                $thesis->quota = $request->quota;
                $thesis->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeThesis(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$thesis = Thesis::where('id', $id);
				if(!$thesis){
					return false;
				}
				$thesis->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex){
			DB::rollback();
			return false;
		}
	}

}