<?php

namespace Modules\Statistic\Http\Controllers\CourseLecturer;;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\CourseLecturer;
use Modules\ManageCategory\Entities\Semester;
use Modules\Statistic\Repositories\CourseLecturerRepository;
use Modules\ManageCategory\Repositories\CoursesRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;
use Excel;

class CourseLecturerController extends Controller
{
    public function getCourseLecturer()
    {
        $teachers = TeacherRepository::getAllTeacher();
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::get_school_active();
        $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();

        if(Auth::user()->checkTeacher()){
                    $course_lecturers =CourseLecturer::selectRaw("course_lecturers.*,semesters.name as semesterName")
                    ->leftjoin('semesters','semesters.semesterID','=','course_lecturers.semesterID')
                    ->where('teacherName',Auth::user()->name)
                    ->get();
        } else {
            $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
        }
        return view('statistic::CourseLecturer.courseLecturer',compact('course_lecturers','teachers','courses','semesters','school_years'));
    }

    

    public function createEditCourseLecturer(Request $request)
    {
        $course_lecturer = CourseLecturerRepository::saveCourseLecturer($request);
        if($course_lecturer == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delCourseLecturer(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn giảng viên môn học nào.!!!'
        ]);
        $course_lecturer = CourseLecturerRepository::removeCourseLecturer($request);
        if($course_lecturer == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }


     public function filterCourseLecturer(Request $request){
        $semester = $request->semester;
        $semesterFilter = Semester::find($semester)->course_lecturers()->get();
        $semester = Semester::find($semester);
        session()->flash('semesterFilter', $semesterFilter);
        session()->flash('semester', $semester);
        return redirect()->back();
    }


     public function postImport(Request $request)
    {

        if($request->file('imported_file'))
        {
                $path = $request->file('imported_file')->getRealPath();
                $data = Excel::load($path, function($reader)
          {
                })->get();

          if(!empty($data) && $data->count())
          {
            foreach ($data->toArray() as $row)
            {
              if(!empty($row))
              {
                $dataArray[] =
                [
                  'semesterID' => $request->semester,
                  'teacherName' => $row['tengv'],
                  'courseName' => $row['monhoc'],
                  'number_of_students' => $row['so_sv'],
                  'course_group' => $row['nhom'],
                  'theory_group' => $row['nhom_lt'],
                  'theory_in_hour' => $row['tronggio_lt'],
                  'theory_overtime' => $row['ngoaigio_lt'],
                  'theory_day_off' => $row['ngaynghi_lt'],
                  'theory_standard' => $row['quychuan_lt'],
                  'practice_group' => $row['nhom_th'],
                  'practice_in_hour' => $row['tronggio_th'],
                  'practice_overtime' => $row['ngoaigio_th'],
                  'practice_day_off' => $row['ngaynghi_th'],
                  'practice_standard' => $row['quychuan_th'],
                  'self_learning_time' => $row['gio_tuhoc'],
                  'self_learning_standard' => $row['quychuan_tuhoc']
                ];
              }
          } 
          if(!empty($dataArray))
          {
                  
            CourseLecturer::insert($dataArray);
            return back();
           }
         }
       }

    }
}
