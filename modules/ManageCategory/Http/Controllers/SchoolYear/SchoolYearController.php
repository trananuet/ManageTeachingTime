<?php

namespace Modules\ManageCategory\Http\Controllers\SchoolYear;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageCategory\Repositories\SchoolYearRepository;

class SchoolYearController extends Controller
{
    /**
    * school year
    * @author AnTV
    * @return view
    */
    public function getSchoolYear(){
        $school_years = SchoolYearRepository::getAllSchoolYear();
        return view('managecategory::SchoolYear.SchoolYear',compact('school_years'));
    }
    
}
