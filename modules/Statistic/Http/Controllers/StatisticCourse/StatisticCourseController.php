<?php

namespace Modules\Statistic\Http\Controllers\StatisticCourse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Data\Entities\CourseLecturer;
use Modules\Data\Entities\DataTeach;
use Modules\ManageCategory\Entities\Semester;
use Modules\Data\Repositories\DataTeachRepository;
use Modules\ManageCategory\Repositories\CoursesRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;
use Excel;

class StatisticCourseController extends Controller
{
    public function getStatisticTeach()
    {
        $teachers = TeacherRepository::getAllTeacher();
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::get_school_active();
        // $data_teaches = DataTeachRepository::get_all_data_teaching();

        if(Auth::user()->checkTeacher()){
            $data_teaches = DataTeach::selectRaw("data_teaches.*,semesters.name as semesterName")
            ->leftjoin('semesters','semesters.semesterID','=','data_teaches.semesterID')
            ->where('teacherName',Auth::user()->name)
            ->get();
        } else {
            $data_teaches = DataTeachRepository::get_all_data_teaching();
        }
        return view('statistic::StatisticCourse.statisticCourse',compact('data_teaches','teachers','courses','semesters','school_years'));
    }

    public function filterStatisticTeach(Request $request){
        $semester_id = $request->semester;
        // dd($semester_id);
        if(Auth::user()->checkTeacher()){
            $data_teaches = DataTeach::selectRaw("data_teaches.*,semesters.name as semesterName")
            ->leftjoin('semesters','semesters.semesterID','=','data_teaches.semesterID')
            ->where([   
                        ['teacherName',Auth::user()->name],
                        ['data_teaches.semesterID',$semester_id]
                    ])
            ->get();
        } else {
            $data_teaches = DataTeach::selectRaw("data_teaches.*,semesters.name as semesterName")
                    ->leftjoin('semesters','semesters.semesterID','=','data_teaches.semesterID')
                    ->where('data_teaches.semesterID',$semester_id)
                    ->get();
        }
        // dd($data_teaches);
        session()->flash('data_teaches', $data_teaches);
        session()->flash('semester_id', $semester_id);
        return redirect()->back();
    }
    public function removeSession(Request $request){
        session()->forget('data_teaches');
        return redirect()->back();
    }
}