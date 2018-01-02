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
use Excel;

class CourseLecturerController extends Controller
{
    public function getCourseLecturer()
    {
        $teachers = TeacherRepository::getAllTeacher();
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::getAllSchoolYear();
        $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
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
                  'yearID' => $request->school_year,
                  'teacherName' => $row['tengiaovien'],
                  'courseName' => $row['tenmonhoc'],
                  'number_of_students' => $row['sosinhvien'],
                  'hour_theory' => $row['giolythuyet'],
                  'practice_hours' => $row['giothuchanh'],
                  'learning_time' => $row['giotuhoc'],
                  'in_hours' => $row['tronggio'],
                  'overtime' => $row['ngoaigio'],
                  'day_off' => $row['ngaynghi'],
                  'converted_hours' => $row['quydoi']
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
