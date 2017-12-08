<?php

namespace Modules\ManageCategory\Http\Controllers\CourseLecturer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\CourseLecturer;
use Modules\ManageCategory\Repositories\CourseLecturerRepository;

class CourseLecturerController extends Controller
{
    public function getCourseLecturer()
    {
        $course_lecturers = CourseLecturerRepository::getAllCourseLecturer();
        return view('managecategory::CourseLecturer.courseLecturer',compact('course_lecturers'));
    }

    

    public function createEditSalary(Request $request)
    {
        $salary = SalaryRepository::saveSalary($request);
        if($salary == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delSalary(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $salary = SalaryRepository::removeSalary($request);
        if($salary == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
