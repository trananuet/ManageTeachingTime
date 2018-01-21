<?php

namespace Modules\Statistic\Http\Controllers\Statistic;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Entities\CourseLecturer;
use Modules\Statistic\Repositories\CourseLecturerRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use PDF;

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

    /**
    * xuat ra file pdf
    * @author AnTV
    * @return view
    */
    public function exportPDF(){
        $course_lecturers = CourseLecturer::leftjoin('courses','course_lecturers.courseName','=','courses.name')
                            ->get();
        // $school_years = SchoolYearRepository::get_school_active();
        // $semesters = SemesterRepository::getAllSemester();
        
        $pdf = PDF::loadView('statistic::Statistic.statisticpdf' , ['course_lecturers' => $course_lecturers]);
        return $pdf->download('course_lecturers.pdf');
    }
}
