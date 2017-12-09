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

    public static function saveCourseLecturer(Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->id)){
                $course_lecturer = CourseLecturer::where('id', $request->id)->firstOrFail();
                $course_lecturer->teacherID = $request->teacher;
                $course_lecturer->courseID = $request->course;
                $course_lecturer->semesterID = $request->semester;
                $course_lecturer->yearID = $request->school_year;
                $course_lecturer->number_of_students = $request->number_of_student;
                $course_lecturer->hour_theory = $request->hour_theory;
                $course_lecturer->practice_hours = $request->practice_hours;
                $course_lecturer->learning_time = $request->learning_time;
                $course_lecturer->in_hours = $request->in_hours;
                $course_lecturer->overtime = $request->overtime;
                $course_lecturer->day_off = $request->day_off;
                $course_lecturer->converted_hours = $request->converted_hours;
                $course_lecturer->exchange = $request->exchange;
                $course_lecturer->save();
                DB::commit();
                return true;
            } else {   
                $course_lecturer = new CourseLecturer();
                $course_lecturer->teacherID = $request->teacher;
                $course_lecturer->courseID = $request->course;
                $course_lecturer->semesterID = $request->semester;
                $course_lecturer->yearID = $request->school_year;
                $course_lecturer->number_of_students = $request->number_of_student;
                $course_lecturer->hour_theory = $request->hour_theory;
                $course_lecturer->practice_hours = $request->practice_hours;
                $course_lecturer->learning_time = $request->learning_time;
                $course_lecturer->in_hours = $request->in_hours;
                $course_lecturer->overtime = $request->overtime;
                $course_lecturer->day_off = $request->day_off;
                $course_lecturer->converted_hours = $request->converted_hours;
                $course_lecturer->exchange = $request->exchange;
                $course_lecturer->save();
                DB::commit();
                return true;
            }
        }
        catch(\Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public static function removeCourseLecturer(Request $request)
    {
        DB::beginTransaction();
        try {
            $checkbox = $request->all();
            foreach($checkbox['checkbox'] as $id) {
                $course_lecturer = CourseLecturer::where('id', $id);
                if(!$course_lecturer){
                    return false;
                }
                $course_lecturer->delete();
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