<?php 
namespace Modules\ManageCategory\Repositories;

use Modules\ManageCategory\Entities\CourseLecturer;
use Modules\ManageCategory\Entities\Course;
use Modules\ManageCategory\Entities\Teacher;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Illuminate\Http\Request;
use DB;

class CourseLecturerRepository 
{

    public static function getAllCourseLecturer()
    {
        $course_lecturer =CourseLecturer::selectRaw("course_lecturers.*,semesters.name as semesterName,school_years.name as yearName,teachers.name as teacherName,courses.name as courseName")
                    ->leftjoin('courses','courses.id','=','course_lecturers.courseID')
                    ->leftjoin('teachers','teachers.id','=','course_lecturers.teacherID')
                    ->leftjoin('semesters','semesters.semesterID','=','course_lecturers.semesterID')
                    ->leftjoin('school_years','school_years.yearID','=','course_lecturers.yearID')
                    ->get();
        return $course_lecturer;
    }

    public static function saveCourses(Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->id)){
                $courses = Courses::where('id', $request->id)->firstOrFail();
                $courses->name = $request->name;
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