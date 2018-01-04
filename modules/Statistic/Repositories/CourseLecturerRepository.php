<?php 
namespace Modules\Statistic\Repositories;

use Modules\Statistic\Entities\CourseLecturer;
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
        $course_lecturer =CourseLecturer::selectRaw("course_lecturers.*,semesters.name as semesterName")
                    ->leftjoin('semesters','semesters.semesterID','=','course_lecturers.semesterID')
                    ->get();
        return $course_lecturer;
    }

    public static function saveCourseLecturer(Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->id)){
                $course_lecturer = CourseLecturer::where('id', $request->id)->firstOrFail();
                $course_lecturer->teacherName = $request->teacher;
                $course_lecturer->courseName = $request->course;
                $course_lecturer->semesterID = $request->semester;
                $course_lecturer->number_of_students = $request->number_of_student;
                $course_lecturer->course_group = $request->course_group;
                $course_lecturer->theory_group = $request->theory_group;
                $course_lecturer->sum_theory_hour = $request->sum_theory_hour;
                $course_lecturer->theory_in_hour = $request->theory_in_hour;
                $course_lecturer->theory_overtime = $request->theory_overtime;
                $course_lecturer->theory_day_off = $request->theory_day_off;
                $course_lecturer->theory_standard = $request->theory_standard;
                $course_lecturer->practice_group = $request->practice_group;
                $course_lecturer->sum_practice_hour = $request->sum_practice_hour;
                $course_lecturer->practice_in_hour = $request->practice_in_hour;
                $course_lecturer->practice_overtime = $request->practice_overtime;
                $course_lecturer->practice_day_off  = $request->practice_day_off ;
                $course_lecturer->practice_standard = $request->practice_standard;
                $course_lecturer->self_learning_time = $request->self_learning_time;
                $course_lecturer->self_learning_standard = $request->self_learning_standard;
                $course_lecturer->save();
                DB::commit();
                return true;
            } else {   
                $course_lecturer = new CourseLecturer();
                $course_lecturer->teacherName = $request->teacher;
                $course_lecturer->courseName = $request->course;
                $course_lecturer->semesterID = $request->semester;
                $course_lecturer->number_of_students = $request->number_of_student;
                $course_lecturer->course_group = $request->course_group;
                $course_lecturer->theory_group = $request->theory_group;
                $course_lecturer->sum_theory_hour = $request->sum_theory_hour;
                $course_lecturer->theory_in_hour = $request->theory_in_hour;
                $course_lecturer->theory_overtime = $request->theory_overtime;
                $course_lecturer->theory_day_off = $request->theory_day_off;
                $course_lecturer->theory_standard = $request->theory_standard;
                $course_lecturer->practice_group = $request->practice_group;
                $course_lecturer->sum_practice_hour = $request->sum_practice_hour;
                $course_lecturer->practice_in_hour = $request->practice_in_hour;
                $course_lecturer->practice_overtime = $request->practice_overtime;
                $course_lecturer->practice_day_off  = $request->practice_day_off ;
                $course_lecturer->practice_standard = $request->practice_standard;
                $course_lecturer->self_learning_time = $request->self_learning_time;
                $course_lecturer->self_learning_standard = $request->self_learning_standard;
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