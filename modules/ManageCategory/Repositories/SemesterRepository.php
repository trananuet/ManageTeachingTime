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
        $semester = Semester::all();
        return $semester;
    }

}