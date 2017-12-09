<?php

namespace Modules\ManageCategory\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Teacher;
use Modules\ManageCategory\Repositories\TeacherRepository;
use Modules\ManageCategory\Repositories\TitleRepository;
use Modules\ManageCategory\Repositories\FacultyRepository;


class TeacherController extends Controller
{
    
    public function getTeacher()
    {
        $titles = TitleRepository::getAllTitle();
        $facultys = FacultyRepository::getAllFaculty();
        $teachers = TeacherRepository::getAllTeacher();
        return view('managecategory::Teacher.teacher',compact('teachers','titles','facultys'));
    }

    

    public function createEditTeacher(Request $request)
    {
        $teacher = TeacherRepository::saveTeacher($request);
        if($teacher == true) {
            return back();
        } else {
            return \Response::view('base::errors.500',array(),500);
        }
    }


    public function delTeacher(Request $request)
    {
        $this->validate($request, [
            'checkbox' => 'required'
        ],[
            'checkbox.required' => 'Bạn chưa chọn giảng viên nào.!!!'
        ]);
        $teacher = TeacherRepository::removeTeacher($request);
        if($teacher == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }
}
