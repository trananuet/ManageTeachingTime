<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\Courses;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Illuminate\Http\Request;
use DB;

class CoursesRepository 
{

    public static function getAllCourses()
    {
        $courses =Courses::selectRaw("courses.*,semesters.name as semesterName,school_years.name as yearName")
                    ->leftjoin('semesters','semesters.semesterID','=','courses.semesterID')
                    ->leftjoin('school_years','school_years.yearID','=','courses.yearID')
                    ->get();
        return $courses;
    }

    public static function saveCourses(Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->id)){
                $courses = Courses::where('id', $request->id)->firstOrFail();
                $courses->name = $request->name;
                $courses->code_name = $request->code_name;
                $courses->credit = $request->credit;
                $courses->semesterID = $request->semester;
                $courses->yearID = $request->schoolYear;
                $courses->theory = $request->theory;
                $courses->practice = $request->practice;
                $courses->self_study = $request->self_study;
                $courses->save();
                DB::commit();
                return true;
            } else {   
                $courses = new Courses();
                $courses->name = $request->name;
                $courses->code_name = $request->code_name;
                $courses->credit = $request->credit;
                $courses->semesterID = $request->semester;
                $courses->yearID = $request->schoolYear;
                $courses->theory = $request->theory;
                $courses->practice = $request->practice;
                $courses->self_study = $request->self_study;
                $courses->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public static function removeCourses(Request $request)
    {
        DB::beginTransaction();
        try {
            $checkbox = $request->all();
            foreach($checkbox['checkbox'] as $id) {
                $course = Courses::where('id', $id);
                if(!$course){
                    return false;
                }
                $course->delete();
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