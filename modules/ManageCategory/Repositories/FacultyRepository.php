<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Faculty;
use Illuminate\Http\Request;
use DB;

class FacultyRepository 
{
    /**
    * title
    * @author Cong
    * @param 
    * @return static
    */
    public static function getAllFaculty()
    {
       	$faculty = Faculty::all(); 
        return $faculty;
    }

    public static function saveFaculty(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->facultyID)){
                $faculty = Faculty::where('facultyID', $request->facultyID)->firstOrFail();
                $faculty->name = $request->Name;
                $faculty->save();
                DB::commit();
                return true;
            } else {   
                $faculty = new Faculty();
                $faculty->name = $request->Name;
                $faculty->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    public static function removeFaculty(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$faculty = Faculty::where('facultyID', $id);
				if(!$faculty){
					return false;
				}
				$faculty->delete();
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