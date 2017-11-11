<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Semester;
use Illuminate\Http\Request;
use DB;

class SemesterRepository 
{
    /**
    * semester
    * @author AnTV
    * @return static
    */
    public static function getAllSemester()
    {
        $semester = Semester::selectRaw("semesters.*,school_years.name as schoolYear")
                            ->leftjoin('school_years','school_years.yearID','=','semesters.yearID')
                            ->get();
        return $semester;
    }
    /**
    * save school year
    * @author AnTV
    * @return static
    */
    public static function saveSemester(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->semesterID)){
                $semester = Semester::where('semesterID', $request->semesterID)->firstOrFail();
                $semester->name = $request->semesters;
                $semester->yearID = $request->yearID;
                $semester->save();
                DB::commit();
                return true;
            } else {   
                $semester = new Semester();
                $semester->name = $request->semesters;
                $semester->yearID = $request->yearID;
                $semester->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
    }

    /**
    * remove semester
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return Modules\ManageCategory\Repositories\SemesterRepository|static boolean
    */
	public static function removeSemester(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$semester = Semester::where('semesterID', $id);
				if(!$semester){
					return false;
				}
				$semester->delete();
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