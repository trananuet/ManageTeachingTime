<?php

namespace Modules\Statistic\Http\Controllers\Statistic;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Statistic\Repositories\CourseLecturerRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;

class StatisticController extends Controller
{
    /**
    * thong ke
    * @author AnTV
    * @return view
    */
    public function getStatistic(){
        $school_years = SchoolYearRepository::getAllSchoolYear();
        $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
        return view('statistic::Statistic.statistic',compact('course_lecturers','school_years'));
    }
}
