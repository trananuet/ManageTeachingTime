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
    * school year active
    * @author AnTV
    * @param DEFINE_ACTIVE = 1 <Helper/DefineHelper>
    * @return static
    */
    public static function get_school_active()
    {
        $schoolYear = SchoolYear::select('yearID','name')->where('active',DEFINE_ACTIVE)
                                ->distinct()
                                ->get('name');
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
            if(isset($request->yearID)) {
                $schoolYear = SchoolYear::where('yearID', $request->yearID)->firstOrFail();
                $schoolYear->name = $request->school_years;
                $active = $request->active;
                if($active == 1){
                    $schoolYear->active = '1';
                } else {
                    $schoolYear->active = '0';
                }
                $schoolYear->save();
                DB::commit();
                return true;
            } else {   
                $schoolYear = new SchoolYear();
                $schoolYear->name = $request->school_years;
                $active = $request->active;
                if($active == 1 ){
                    $schoolYear->active = '1';
                } else {
                    $schoolYear->active = '0';
                }
                $schoolYear->save();
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
    * remove check school year
    * @author AnTV
    * @param Illuminate\Http\Request $request
    * @return Modules\ManageCategory\Repositories\SchoolYearRepository|static boolean
    */
	public static function removeSchoolYear(Request $request)
    {
		DB::beginTransaction();
		try {
			$checkbox = $request->all();
			foreach($checkbox['checkbox'] as $id) {
				$schoolYear = SchoolYear::where('yearID', $id);
				if(!$schoolYear) {
					return false;
				}
				$schoolYear->delete();
			}
			DB::commit();
			return true;
		}
		catch(\Exception $ex) {
			DB::rollback();
			return false;
		}
	}

    /**
    * remove one school year
    * @author AnTV
    * @param int $yearID
    * @return Modules\ManageCategory\Repositories\SchoolYearRepository|static boolean
    */
	// public static function deleteSchoolYear($yearID)
    // {
	// 	DB::beginTransaction();
	// 	try {
	// 		$delSch = SchoolYear::findorFail($yearID);
	// 		$delSch->delete();
	// 		DB::commit();
	// 		return true;
	// 	}
	// 	catch(\Exception $ex) {
	// 		DB::rollback();
	// 		return false;
	// 	}
	// }

}