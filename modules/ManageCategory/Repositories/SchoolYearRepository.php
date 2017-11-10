<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\SchoolYear;
use Illuminate\Http\Request;
use DB;

class SchoolYearRepository 
{
    /**
    * school year
    * @author AnTV
    * @return static
    */
    public static function getAllSchoolYear()
    {
        $schoolYear = SchoolYear::all();
        return $schoolYear;
    }

    /**
    * save school year
    * @author AnTV
    * @return static
    */
    public static function saveSchoolYear(Request $request)
    {
        DB::beginTransaction();
		try {
            if(isset($request->yearID)){
                $schoolYear = SchoolYear::where('yearID', $request->yearID)->firstOrFail();
                $schoolYear->name = $request->school_years;
                $schoolYear->active = $request->active;
                $schoolYear->save();
                DB::commit();
                return true;
            } else {   
                $schoolYear = new SchoolYear();
                $schoolYear->name = $request->school_years;
                $schoolYear->active = $request->active;
                $schoolYear->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex){
			DB::rollback();
			return false;
		}
    }
    /**
    * remove school year
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return Modules\Candidate\Repositories\CandidateRepository|static boolean
    */
	public static function removeSchoolYear(Request $request){
		DB::beginTransaction();
		try{
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$schoolYear = SchoolYear::where('yearID', $id);
				if(!$schoolYear){
					return false;
				}
				$schoolYear->delete();
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