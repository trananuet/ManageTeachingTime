<?php

namespace Modules\ManageCategory\Http\Controllers\Thesis;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\ManageCategory\Entities\Thesis;
use Modules\ManageCategory\Repositories\ThesisRepository;


class ThesisController extends Controller
{
    
    public function getThesis()
    {
        $thesis = ThesisRepository::getAllThesis();
        return view('managecategory::Thesis.thesis',compact('thesis'));
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
            'checkbox.required' => 'Bạn chưa chọn chức danh nào.!!!'
        ]);
        $teacher = TeacherRepository::removeTeacher($request);
        if($teacher == true) {
            return redirect()->back();
        } else {
             return \Response::view('base::errors.500',array(),500);
        }
    }   
}
