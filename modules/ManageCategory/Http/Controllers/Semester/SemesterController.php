<?php

namespace Modules\ManageCategory\Http\Controllers\Semester;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Entities\SchoolYear;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;

class SemesterController extends Controller
{
    /**
    * semester
    * @author AnTV
    * @return view
    */
    public function getSemester(){
        // $school_years = SchoolYear::find(1)->semesters()->get();
        // dd($school_years);
        $school_years = SchoolYearRepository::getAllSchoolYear();
        $semesters = SemesterRepository::getAllSemester();
        return view('managecategory::Semester.semester',compact('school_years','semesters'));
    }
}