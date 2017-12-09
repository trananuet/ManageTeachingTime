<?php

namespace Modules\ManageCategory\Http\Controllers\CourseLecturer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\CourseLecturer;
use Modules\ManageCategory\Repositories\CourseLecturerRepository;
use Modules\ManageCategory\Repositories\CoursesRepository;
use Modules\ManageCategory\Repositories\SemesterRepository;
use Modules\ManageCategory\Repositories\SchoolYearRepository;
use Modules\ManageCategory\Repositories\TeacherRepository;


class CourseLecturerController extends Controller
{
    public function getCourseLecturer()
    {
        $teachers = TeacherRepository::getAllTeacher();
        $courses = CoursesRepository::getAllCourses();
        $semesters = SemesterRepository::getAllSemester();
        $school_years = SchoolYearRepository::getAllSchoolYear();
        $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
        return view('managecategory::CourseLecturer.courseLecturer',compact('course_lecturers','teachers','courses','semesters','school_years'));
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
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $course_lecturer = CourseLecturerRepository::removeCourseLecturer($request);
        if($course_lecturer == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
