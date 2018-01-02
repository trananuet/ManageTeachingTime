<?php

namespace Modules\Statistic\Http\Controllers\Statistic;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\CourseLecturer;
use Modules\Statistic\Repositories\CourseLecturerRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;

class StatisticController extends Controller
{
    /**
    * thong ke
    * @author AnTV
    * @return view
    */
    public function getStatistic(){
        $school_years = SchoolYearRepository::get_school_active();
        $semesters = SemesterRepository::getAllSemester();
        // $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
        $course_lecturers = CourseLecturer::leftjoin('courses','course_lecturers.courseName','=','courses.name')
                            ->get();
                            // dd($course_lecturers);

        return view('statistic::Statistic.statistic',compact('course_lecturers','school_years','semesters'));
    }
}
