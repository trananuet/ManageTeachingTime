<?php

namespace Modules\ManageCategory\Http\Controllers\Courses;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Courses;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\CoursesRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Excel;


class CoursesController extends Controller
{
    public function getCourses()
    {
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::get_school_active();
        return view('managecategory::Courses.courses',compact('courses','semesters','school_years'));
    }

    public function createEditCourses(Request $request)
    {
        $courses = CoursesRepository::saveCourses($request);
        if($courses == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delCourses(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn môn học nào.!!!'
        ]);
        $courses = CoursesRepository::removeCourses($request);
        if($courses == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
    /**
    * filter 
    * @author AnTV
    * @param $request
    * @return view
    */
    public function filterCourses(Request $request){
        $year_id = $request->year_id;
        $semester_id = $request->semester_id;
        // $courses = Courses::where([
        //                         ['yearID',$year_id],
        //                         ['semesterID',$semester_id]
        //                         ])->get();
        if($year_id != "" || $semester_id != "" ){
            if($request->has('year_id')){
                $course = Courses::where('yearID',$year_id);
            }
            if($request->has('semester_id')){
                $course = Courses::where('semesterID',$semester_id);
            }
        }
        $courses = $course->get();
        session()->flash('courses', $courses);
        session()->flash('year_id', $year_id);
        session()->flash('semester_id', $semester_id);
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
                  'name' => $row['name'],
                  'semesterID' => $request->semesterID,
                  'yearID' => $request->yearID,
                  'theory' => $row['theory'],
                  'practice' => $row['practice'],
                  'self_study' => $row['self_study']
                ];
              }
          } 
          if(!empty($dataArray))
          {
                  
            Courses::insert($dataArray);
            return back();
           }
         }
       }

    }
}
