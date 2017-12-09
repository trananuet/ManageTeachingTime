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


class CoursesController extends Controller
{
    public function getCourses()
    {
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $schoolYears = SchoolYearRepository::getAllSchoolYear();
        return view('managecategory::Courses.courses',compact('courses','semesters','schoolYears'));
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
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $courses = CoursesRepository::removeCourses($request);
        if($courses == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
