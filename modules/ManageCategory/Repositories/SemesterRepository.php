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

}