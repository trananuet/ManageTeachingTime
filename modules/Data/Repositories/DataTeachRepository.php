<?php 
namespace Modules\Data\Repositories;

use Modules\Data\Entities\DataTeach;
use Modules\ManageCategory\Entities\Course;
use Modules\ManageCategory\Entities\Teacher;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Illuminate\Http\Request;
use DB;

class DataTeachRepository 
{

    /**
    * data teach
    * @author AnTV
    * @param 
    * @return static
    */

    public static function get_all_data_teaching()
    {
        $data_teach =DataTeach::selectRaw("data_teaches.*,semesters.name as semesterName")
                    ->leftjoin('semesters','semesters.semesterID','=','data_teaches.semesterID')
                    ->get();
        return $data_teach;
    }


    /**
    * them sua data
    * @author AnTV
    * @param 
    * @return static
    */
    public static function save_data_teach(Request $request)
    {
        DB::beginTransaction();
        try {
            if(isset($request->id)){
                $data_teach = DataTeach::where('id', $request->id)->firstOrFail();
                $data_teach->teacherName = $request->teacher;
                $data_teach->courseName = $request->course;
                $data_teach->semesterID = $request->semester;
                $data_teach->number_of_students = $request->number_of_student;
                $data_teach->course_group = $request->course_group;
                $data_teach->theory_group = $request->theory_group;
                $data_teach->sum_theory_hour = $request->sum_theory_hour;
                $data_teach->theory_in_hour = $request->theory_in_hour;
                $data_teach->theory_overtime = $request->theory_overtime;
                $data_teach->theory_day_off = $request->theory_day_off;
                $data_teach->theory_standard = $request->theory_standard;
                $data_teach->practice_group = $request->practice_group;
                $data_teach->sum_practice_hour = $request->sum_practice_hour;
                $data_teach->practice_in_hour = $request->practice_in_hour;
                $data_teach->practice_overtime = $request->practice_overtime;
                $data_teach->practice_day_off  = $request->practice_day_off ;
                $data_teach->practice_standard = $request->practice_standard;
                $data_teach->self_learning_time = $request->self_learning_time;
                $data_teach->self_learning_standard = $request->self_learning_standard;
                $data_teach->save();
                DB::commit();
                return true;
            } else {   
                $data_teach = new DataTeach();
                $data_teach->teacherName = $request->teacher;
                $data_teach->courseName = $request->course;
                $data_teach->semesterID = $request->semester;
                $data_teach->number_of_students = $request->number_of_student;
                $data_teach->course_group = $request->course_group;
                $data_teach->theory_group = $request->theory_group;
                $data_teach->sum_theory_hour = $request->sum_theory_hour;
                $data_teach->theory_in_hour = $request->theory_in_hour;
                $data_teach->theory_overtime = $request->theory_overtime;
                $data_teach->theory_day_off = $request->theory_day_off;
                $data_teach->theory_standard = $request->theory_standard;
                $data_teach->practice_group = $request->practice_group;
                $data_teach->sum_practice_hour = $request->sum_practice_hour;
                $data_teach->practice_in_hour = $request->practice_in_hour;
                $data_teach->practice_overtime = $request->practice_overtime;
                $data_teach->practice_day_off  = $request->practice_day_off ;
                $data_teach->practice_standard = $request->practice_standard;
                $data_teach->self_learning_time = $request->self_learning_time;
                $data_teach->self_learning_standard = $request->self_learning_standard;
                $data_teach->save();
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
    * xoa data
    * @author AnTV
    * @param 
    * @return static
    */

    public static function remove_data_teach(Request $request)
    {
        DB::beginTransaction();
        try {
            $checkbox = $request->all();
            foreach($checkbox['checkbox'] as $id) {
                $data_teach = DataTeach::where('id', $id);
                if(!$data_teach){
                    return false;
                }
                $data_teach->delete();
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