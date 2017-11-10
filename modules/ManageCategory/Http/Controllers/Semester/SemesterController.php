<?php

namespace Modules\ManageCategory\Http\Controllers\Semester;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Semester;
use Modules\ManageCategory\Repositories\SemesterRepository;

class SemesterController extends Controller
{
    /**
    * semester
    * @author AnTV
    * @return view
    */
    public function getSemester(){
        // $semester = SchoolYearRepository::getAllSemester();
        // return view('managecategory::Semester.semester',compact('semester'));
        return view('managecategory::Semester.semester');
    }
}